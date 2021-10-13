<?php

namespace App\Exports;

use App\DataTables\Scopes\DateDatatableScope;
use App\DataTables\Scopes\InvoiceTypeScope;
use App\Models\Fee;
use App\Models\FormType;
use App\Models\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeWriting;

class FeeExport implements FromQuery, ShouldQueue, WithMapping, ShouldAutoSize, WithHeadings, WithTitle, WithEvents
{

    use RegistersEventListeners;
    private $data;
    private static $total_fee;
    private static $fees;
    private static $headings = [
        'Form No',
        'Year',
        'Major',
        'Name',
        'Phone',
        'Received At'
    ];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function query()
    {
        return Invoice::with('form.appliedUser.studentdetails', 'form.appliedUser.enrollments')
            ->join('forms', 'invoices.form_id', '=', 'forms.id')
            ->join('form_types', 'forms.form_type_id', '=', 'form_types.id')
            ->select([
                'invoices.id',
                'invoices.data',
                'form_id',
                'form_types.id as form_type_id',
                'form_types.name as form_type',
                'invoices.payment_received_user_id',
                'invoices.payment_received_status',
                'invoices.payment_received_message',
                'invoices.payment_received_at',
                'invoices.created_at',
                'invoices.updated_at'
            ])->when($this->data && array_key_exists('form_type', $this->data), function ($query) {
                return (new InvoiceTypeScope($this->data))->apply($query);
            })
            ->when($this->data && array_key_exists('date_type', $this->data), function ($query) {
                return (new DateDatatableScope($this->data))->apply($query);
            });
    }

    public function headings(): array
    {


        self::$fees = Fee::all();
        self::$total_fee = 0;
        $headings = array_merge(self::$headings, self::$fees->pluck('name')->all());
        $headings[] = 'စုစုပေါင်း';
        return $headings;

    }

    public function map($invoice): array
    {
        $map = [
            $invoice->form_id,
            $invoice->form->appliedUser->enrollments->last()->year,
            $invoice->form->appliedUser->enrollments->last()->major,
            $invoice->form->appliedUser->studentdetails->name_mm ?? '-',
            '09' . $invoice->form->appliedUser->phone ?? '-',
            $invoice->payment_received_at,
        ];
        //fees
        $total = 0;
        foreach (self::$fees as $fee) {
            $amount = extract_value_from_array($fee->name, $invoice->data['fee'])['amount'] ?? 0;
            $map [] = $amount;
            $total += $amount;
            $fee_total = $fee->total ?? 0;
            $fee_total += $amount;
            $fee->total = $fee_total;
        }
        $map[] = $total;
        self::$total_fee += $total;

        return $map;
    }

    public function title(): string
    {
        return 'Fees';
    }


    public static function afterSheet(AfterSheet $event)
    {
        $alphabets = range('A', 'Z');
        $sheet = $event->sheet;
        $totalRow = $sheet->getHighestRow();
//        $lastColumn = $sheet->getHighestColumn();
        $cellToSkip = count(self::$headings);
        $row = [];
        foreach (self::$fees as $fee) {
            $row[] = $fee->total ?? 0;
        }
        $row[] = self::$total_fee;
//
//        foreach ($alphabets as $key => $alphabet) {
//            if ($key < $cellToSkip) continue;
//            $row[] = "=sum({$alphabet}2:{$alphabet}$totalRow)";
//            if ($alphabet == $lastColumn) break;
//        }


        $sheet->append($row, $alphabets[$cellToSkip] . '' . $totalRow);

//        $totalRow = $totalRow = $sheet->getHighestRow();
        $cellToSkip -= 1;
        $totalRow += 1;

        $sheet->setCellValue("A$totalRow", 'Total');
        $cellToMerge = "A{$totalRow}:$alphabets[$cellToSkip]$totalRow";

        $sheet->mergeCells($cellToMerge);

        $sheet->getstyle(
            $cellToMerge)->applyFromArray([

                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]
        );

    }

}
