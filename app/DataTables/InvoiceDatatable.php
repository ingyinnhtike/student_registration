<?php

namespace App\DataTables;


use App\Exports\FormExport;
use App\Exports\InvoiceExport;
use App\Helpers\LogHelper;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Auth;

class InvoiceDatatable extends DataTable
{
    use LogHelper;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('id', function ($data) {
                return $data->form_id;
            })
            ->editColumn('total', function ($data) {
                return $data->data['total'];
            })
            ->editColumn('Type', function ($data) {
                return $data->form->type->name;
            })
            ->editColumn('Received at', function ($data) {
                return $data->payment_received_at->diffForHumans();
            })
            ->editColumn('phone', function ($data) {
                return $data->form->appliedUser->studentDetails->permanent_phone ?? '';
            })->editColumn('name', function ($data) {
                return $data->form->appliedUser->studentDetails->name_mm ?? '';
            })
            ->addColumn('action', '');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\InvoiceDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model)
    {
        $user_id = Auth::User()->id;
        if($user_id == 3)
        {
            return Invoice::query()
            ->join('forms', 'invoices.form_id', '=', 'forms.id')
            ->join('form_types', 'forms.form_type_id', '=', 'form_types.id')
            ->where('forms.university_status', 1)
            ->select([
                'invoices.id',
                'invoices.data',
                'form_id',
                'form_types.id as form_type_id',
                'form_types.name as form_type',
                'payment_received_user_id',
                'payment_received_status',
                'payment_received_message',
                'invoices.payment_received_at',
                'invoices.created_at',
                'invoices.updated_at'
            ])
            ->with('form.type', 'form.appliedUser.studentDetails');
        }
        else if($user_id == 1){
            return Invoice::query()
            ->join('forms', 'invoices.form_id', '=', 'forms.id')
            ->join('form_types', 'forms.form_type_id', '=', 'form_types.id')
            ->where('forms.university_status', 0)
            ->select([
                'invoices.id',
                'invoices.data',
                'form_id',
                'form_types.id as form_type_id',
                'form_types.name as form_type',
                'payment_received_user_id',
                'payment_received_status',
                'payment_received_message',
                'invoices.payment_received_at',
                'invoices.created_at',
                'invoices.updated_at'
            ])
            ->with('form.type', 'form.appliedUser.studentDetails');
        }else{
            return Invoice::query()
            ->join('forms', 'invoices.form_id', '=', 'forms.id')
            ->join('form_types', 'forms.form_type_id', '=', 'form_types.id')
            ->select([
                'invoices.id',
                'invoices.data',
                'form_id',
                'form_types.id as form_type_id',
                'form_types.name as form_type',
                'payment_received_user_id',
                'payment_received_status',
                'payment_received_message',
                'invoices.payment_received_at',
                'invoices.created_at',
                'invoices.updated_at'
            ])
            ->with('form.type', 'form.appliedUser.studentDetails');
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('invoicedatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('print'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            'id' => [
                'title' => 'Form No'
            ],
            'total' => [
                'searchable' => false,
                'sortable' => false
            ],
            'name' => [
                'searchable' => false,
                'sortable' => false
            ],
            'phone' => [
                'title' => 'Permanent Phone',
                'sortable' => false
            ],
            'Type' => [
                'searchable' => false,
                'sortable' => false
            ],

            'Received at' => [
                'searchable' => false,
                'sortable' => false
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Invoice_' . date('YmdHis');
    }

    public function excel()
    {
        $request = $this->request();
        $filename = $this->filename() . '.' . $this->excelWriter;
        $this->recordLog($filename, 'excel_report', $request->all());
        return Excel::download(new InvoiceExport($request->all()), $filename);

    }
}
