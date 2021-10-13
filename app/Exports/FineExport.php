<?php

namespace App\Exports;

use App\DataTables\Scopes\DateDatatableScope;
use App\DataTables\Scopes\InvoiceTypeScope;
use App\Models\Fine;
use App\Models\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class FineExport implements FromQuery, ShouldQueue, WithMapping, ShouldAutoSize, WithHeadings,WithTitle,WithEvents
{
    use RegistersEventListeners;
    protected $data;
    private $fine_names;

    private static $headings = [
        //title => relation
        'Invoice No' => 'id',
        'Form No' => 'form_id',
        'Phone' => 'form->appliedUser->phone',
        'Name'=>'form->appliedUser->studentDetails->name_mm',
        'Received At' => 'payment_received_at',
    ];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function query()
    {
        $query = Invoice::
        with('form.appliedUser.fines')
            ->join('forms', 'invoices.form_id', '=', 'forms.id')
            ->select([
                'invoices.id',
                'invoices.data',
                'form_id',

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
        return $query;
    }

    public function headings(): array
    {
        $headings = array_keys(self::$headings);

        $this->fine_names = Fine::all('name')->pluck('name')->all();
        $headings = array_merge($headings, $this->fine_names);
        $headings [] = 'စုစုပေါင်း';
        return $headings;
    }

    public function map($invoice): array
    {

        $map = [];
        foreach (self::$headings as $value) {
            if(Str::contains($value,'->')){
                $value = explode('->',$value);
                $data = $invoice;
                foreach ($value as $step){
                    if($data) {
                        $data = $data->$step;
                    }
                }
                $map [] = $data;
            }else {
                $map [] = $invoice->$value;
            }
        }

        $total = 0;
        foreach ($this->fine_names as $fine_name) {
           $amount = $invoice->data['fine'][$fine_name]['amount'] ?? 0;
           $map[] = $amount;
           $total += $amount;
        }
        $map[] = $total;
        return $map;
    }

    public function title(): string
    {
        return 'Fines';
    }

    public static function afterSheet(AfterSheet $event)
    {
        $alphabets = range('A', 'Z');
        $sheet = $event->sheet;
        $totalRow = $sheet->getHighestRow();
        $lastColumn = $sheet->getHighestColumn();
        $cellToSkip = count(self::$headings);
        $row = [];
        foreach ($alphabets as $key => $alphabet) {
            if ($key < $cellToSkip) continue;
            $row[] = "=sum({$alphabet}2:{$alphabet}$totalRow)";
            if ($alphabet == $lastColumn) break;
        }


        $sheet->append($row, $alphabets[$cellToSkip] . '' . $totalRow);

        $totalRow = $totalRow = $sheet->getHighestRow();
        $cellToSkip -= 1;

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
