<?php

namespace App\Exports;

use App\DataTables\Scopes\AcceptanceTypeScope;
use App\DataTables\Scopes\DateDatatableScope;
use App\Helpers\LogHelper;
use App\Models\Form;
use App\Township;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Facades\Excel;

class FormExport implements FromQuery, ShouldQueue, WithMapping, ShouldAutoSize, WithHeadings
{
    use Exportable;
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    protected $export_fields = [
        'Applied Year' => 'year',
        'Major' => 'major',
        'Role No.' => 'roll_no',

        'Student Name mm' => 'name_mm',
        'Student Name English' => 'name_eng',
        'Photo' => 'photo',
        'Student Blood Type' => 'blood_type',
        'Student Email' => 'email',
        'Permanent Phone' => 'permanent_phone',
        'Permanent Address' => 'permanent_address',
        'Current Phone' => 'current_phone',
        'Current Address' => 'current_address',
        'Student DOB' => 'dob',
        'Student Birth Township' => 'township',
        'Student Birth District' => 'district',
        'Student Birth State' => 'state',
        'Student NRC' => 'nrc',
        'Student Race' => 'race',
        'Student Religion' => 'religion',
        'Student Gender' => 'gender',

        'Father Name mm' => 'father_name_mm',
        'Father Name English' => 'father_name_eng',
        'Father Birth Township' => 'father_township',
        'Father Birth District' => 'father_district',
        'Father Birth State' => 'father_state',
        'Father NRC' => 'father_nrc',
        'Father Race' => 'father_race',
        'Father Religion' => 'father_religion',
        'Father Status' => 'father_availability',
        'Father is guardian' => 'father_is_guardian',
        'Father Work' => 'father_work',
        'Father Email' => 'father_email',
        'Father Phone' => 'father_phone',
        'Father Address' => 'father_address',

        'Mother Name mm' => 'mother_name_mm',
        'Mother Name English' => 'mother_name_eng',
        'Mother Birth Township' => 'mother_township',
        'Mother Birth District' => 'mother_district',
        'Mother Birth State' => 'mother_state',
        'Mother NRC' => 'mother_nrc',
        'Mother Race' => 'mother_race',
        'Mother Religion' => 'mother_religion',
        'Mother Status' => 'mother_availability',
        'Mother is guardian' => 'mother_is_guardian',
        'Mother Work' => 'mother_work',
        'Mother Email' => 'mother_email',
        'Mother Phone' => 'mother_phone',
        'Mother Address' => 'mother_address',


        'Other Guardian Name mm' => 'other_name_mm',
        'Other Guardian Name English' => 'other_name_eng',
        'Other Guardian Birth Township' => 'other_township',
        'Other Birth District' => 'other_district',
        'Other Guardian Birth State' => 'other_state',
        'Other Guardian NRC' => 'other_nrc',
        'Other Guardian Race' => 'other_race',
        'Other Guardian Religion' => 'other_religion',
        'Other Guardian Relation To User' => 'other_relation_to_user',
        'Other Guardian Work' => 'other_work',
        'Other Guardian Email' => 'other_email',
        'Other Guardian Phone' => 'other_phone',
        'Other Guardian Address' => 'other_address',

        'High School Roll No' => 'high_school_roll_no',
        'High School ExamRecord Location' => 'high_school_exam_location',
        'High School Pass Year' => 'high_school_year',
        'High School Total Mark' => 'high_school_total_mark',
        'High School Distinctions' => 'high_school_distinctions',


        'Scholar Name' => 'scholar_name',
        'Scholar Organization' => 'scholar_organization',
        'Scholar Amount' => 'scholar_amount',

    ];

    public function query()
    {
        return Form::query()
            ->when($this->data && array_key_exists('accept_type', $this->data), function ($query) {
                return (new AcceptanceTypeScope($this->data))->apply($query);
            })
            ->when($this->data && array_key_exists('date_type', $this->data), function ($query) {
                return (new DateDatatableScope($this->data))->apply($query);
            });
    }

    public function headings(): array
    {
        $headings = [
            'Form No.',
            'Type',

            'Approved Status',
            'Approved At',

            'Payment Status',
            'Payment Received At',
        ];
        return array_merge($headings, array_keys($this->export_fields));
    }

    public function map($form): array
    {
        $data = $form->data;
        $states = config('constants.states');
        $township = null;

        $map = [
            $form->id,
            $form->type->name,
            get_approved_status($form->approved_status),
            $form->approved_at ?? '-',
            get_payment_status($form->payment_receive_status),
            $form->payment_received_at ?? '-',
        ];

        
        foreach ($this->export_fields as $field) {
            if (Str::contains($field, 'township')) {
                $township_id = extract_value_from_array($field, $data);
                if ($township_id && is_numeric($township_id)) {
                    $township = Township::with('district.state')->find($township_id);
                    $map[] = $township->name ?? '-';
                } else {
                    $township = null;
                    $map[] = $township_id ?? '-';
                }
            } else if (Str::contains($field, 'district')) {

                $map [] = $township->district->name ?? '-';

            } else if (Str::contains($field, 'state')) {
                if ($township !== null) {
                    $map [] = $township->district->state->name;
                } else {
                    $index = extract_value_from_array($field, $data);
                    if ($index) {
                        $map [] = $states[$index] ?? '-';
                    } else {
                        $map [] = '-';
                    }
                }

            } else if ($field === 'stipend') {
                
                $map[] = $data[$field] == 0 ? 'Not Applied' : 'Applied';
            } else if (Str::contains($field, 'availability')) {
                $map [] = $data[$field] == 0 ? 'Decreased' : 'Alive';
            } else if (Str::contains($field, 'is_guardian')) {
                $map [] = $data[$field] == 0 ? 'No' : 'Yes';
            } else if ($field === 'photo') {
                $map [] = Str::contains($data[$field], 'default.jpg') ? 'No Photo' : 'Applied';
            } else {
                $map [] = $data[$field] ?? '-';
            }
        }
        return $map;

    }

}
