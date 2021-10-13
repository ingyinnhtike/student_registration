<?php

namespace App\Exports;

use App\DataTables\Scopes\AcceptanceTypeScope;
use App\DataTables\Scopes\DateDatatableScope;
use App\Models\Form;
use App\Township;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomExport implements FromQuery, ShouldQueue, WithMapping, ShouldAutoSize, WithHeadings
{
    use Exportable;

    /**
     * ['title'=>[keys for extracting from data from database ]
     * @var array;
     */
    private $data;

    protected $export_fields = [

    ];

    public function __construct($data)
    {
        $this->data = $data;
        /**
         *
         * total title and key list the user want to export
         * @var array;
         */
        $export_fields = [

        ];

        foreach ($this->data as $type => $value) {
            if ($type !== 'အဓိကဘာသာ' && $type !== 'သင်တန်းနှစ်' && is_array($value)) {
                $export_fields = array_merge($export_fields, $value);
            }
        }

        $this->export_fields = $export_fields;

    }


    public function query()
    {
        $majors = extract_value_from_array('အဓိကဘာသာ', $this->data);
        $years = extract_value_from_array('သင်တန်းနှစ်', $this->data);

        if (!$majors) {
            abort(400, 'At least one major need to be selected.');
        }

        if (!$years) {
            abort(400, 'At least one year need to be selected.');
        }

        $major_ids = array_values($majors);
        $year_ids = array_values($years);

        $query_courses = DB::table('courses')
            ->select(['id', 'year_id', 'major_id'])
            ->whereIn('major_id', $major_ids)
            ->whereIn('year_id', $year_ids)
            ->orderBy('year_id');

        $query_applied_courses = DB::table('applied_courses')
            ->select(['user_id', 'courses.year_id as year_id', 'courses.major_id as major_id', 'applied_courses.id as applied_course_id'])
            ->joinSub($query_courses, 'courses', function ($query) {
                $query->on('courses.id', '=', 'applied_courses.course_id');
            });


        $query = Form::query()
            ->joinSub($query_applied_courses, 'applied_courses', function ($query) {
                $query->on('applied_courses.user_id', '=', 'forms.applied_user_id');
            })
            ->with('appliedUser.studentDetails')
            ->when($this->data && array_key_exists('date_type', $this->data), function ($query) {
                return (new DateDatatableScope($this->data))->apply($query);
            })
            ->orderBy('year_id');

        return $query;
    }

    public function headings(): array
    {
        $headings = [
            'Form No.'
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

            } elseif ($field === 'approved_status') {
                $map [] = get_approved_status($form->approved_status);
            } elseif ($field === 'payment_status') {
                $map[] = get_payment_status($form->payment_receive_status);
            } elseif ($field === 'stipend') {
                $map[] = $data['stipend'] == 0 ? 'Not Applied' : 'Applied';
            } elseif (Str::contains($field, 'availability')) {
                $map [] = $data[$field] == 0 ? 'Decreased' : 'Alive';
            } elseif (Str::contains($field, 'is_guardian')) {
                $map [] = $data[$field] == 0 ? 'No' : 'Yes';
            } elseif ($field === 'photo') {
                $map [] = Str::contains($data[$field], 'default.jpg') ? 'No Photo' : 'Applied';
            } else {
                $map [] = $data[$field] ?? '-';
            }
        }
        return $map;

    }
}
