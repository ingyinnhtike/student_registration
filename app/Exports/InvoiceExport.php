<?php

namespace App\Exports;

use App\DataTables\Scopes\DateDatatableScope;
use App\DataTables\Scopes\InvoiceTypeScope;
use App\Models\FormType;
use App\Models\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InvoiceExport implements WithMultipleSheets
{
    use Exportable;
    private $data;
    private $fees;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [
            new FeeExport($this->data),
            new FineExport($this->data),

        ];

        return $sheets;

    }


}
