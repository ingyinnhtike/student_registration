<?php

namespace App\DataTables;

use App\Exports\FormExport;
use App\Helpers\LogHelper;
use App\Models\Form;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FormDataTable extends DataTable
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
            ->addColumn('action', function ($data) {
                return $this->getActions($data);
            })
            ->editColumn('type', function ($data) {
                return $data->type->name;
            })
            ->editColumn('appliedUser.phone', function ($data) {
                $phone = $data->appliedUser->phone;
                return "<a href='tel:09$phone'>09$phone</a>";
            })
            ->editColumn('Roll No', function ($data) {
                $key = config('site-setting.roll_no_to_show', 'roll_no');
                return extract_value_from_array($key, $data->data,'-');
            })
            ->editColumn('Submitted At', function ($data) {
                return $data->created_at->diffForHumans();
            })
            ->editColumn('Student Name', function ($data) {
                return $data->data['name_mm'];
            })
            ->editColumn('Payment Status', function ($data) {
                return get_payment_status($data->payment_receive_status);
            })
            ->editColumn('Payment Received At', function ($data) {
                return $data->payment_received_at;
            })
            ->rawColumns(['appliedUser.phone', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Form $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Form $model)
    {
        return $model->newQuery()
            ->with('appliedUser', 'type');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('formdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
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
                ->width(100)
                ->addClass('text-center'),
            'id' => [
                'title' => 'Form No',
            ],
            'type' => [
                'searchable' => false,
                'sortable' => false,
            ],
            'Student Name' => [
                'searchable' => false,
                'sortable' => false,
            ],
            'Roll No' => [
                'searchable' => false,
                'searchable' => false,
                'sortable' => false,
            ],
            'appliedUser.phone' => [
                'title' => 'Phone',
                
            ],
            'Payment Status' => [
                'searchable' => false,
                'sortable' => false,

            ],
            'Payment Received At' => [
                'searchable' => false,
                'sortable' => false,
            ],
            'Submitted At' => [
                'searchable' => false,
                'sortable' => false,
            ],
        ];
    }

    private function getActions($data)
    {

        $action = '';

        $action .= $this->getViewAction($data);

        $action .= $this->getApproveActions($data);

        return $action;


    }

    private function getViewAction($data): string
    {
        $viewUrl = route('enroll.show', ['enroll' => $data->id]);
        return "<a class='btn btn-primary m-1' href='$viewUrl'><span class='fa fa-eye'></span></a>";
    }

    private function getApproveActions($data): string
    {
        if ($data->approved_status === 0) {
            $editUrl = route('enroll.edit', ['enroll' => $data->id]);
            return "<a class='btn btn-primary m-1' href='$editUrl' ><span class='fa fa-edit'></span></a>" .
                "<a class='btn btn-danger m-1' onclick='confirmReject(this)' data-id='$data->id' data-message='Form No. $data->id'><span class='fa fa-times'></span></a>" .
                "<a class='btn btn-success m-1' onclick='confirmAccept(this)' data-id='$data->id' data-message='Form No. $data->id'><span class='fa fa-check'></span></a>";
        } elseif ($data->approved_status === 1) {
            if (config('site-setting.can_edit_after_approve', false)) {
                $editUrl = route('enroll.edit', ['enroll' => $data->id]);
                return "<a class='btn btn-primary m-1' href='$editUrl' ><span class='fa fa-edit'></span></a>";
            } else {
                return '';
            }
        } else {
            return '';
        }
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Form_' . date('YmdHis');
    }

    public function excel()
    {
        $request = $this->request();

        $filename = $this->filename() . '.' . $this->excelWriter;
        $this->recordLog($filename, 'excel_report', $request->all());
        return Excel::download(new FormExport($request->all()), $filename);
    }
}
