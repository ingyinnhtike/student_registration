<?php

namespace App\DataTables;


use App\Models\Acceptance;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AcceptanceDataTable extends DataTable
{
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
            ->editColumn('Submitted At', function ($data) {
                return $data->created_at->diffForHumans();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AcceptanceDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Acceptance $model)
    {
        return $model->with('enrollment');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('acceptancedatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(

                Button::make('export'),
                Button::make('reset'),
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
                ->width(150)
                ->addClass('text-center'),
            Column::make('id'),
            'enrollment.year'=>[
                'title'=>'year'
            ],
            'enrollment.major'=>[
                'title'=>'major'
            ],'enrollment.roll_no'=>[
                'title'=>'Roll No.'
            ],
            Column::make('Submitted At'),
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
            return /*"<a class='btn btn-danger m-1' onclick='confirmReject(this)' data-id='$data->id'><span class='fa fa-times'></span></a>" .*/
                "<a class='btn btn-success m-1' onclick='confirmAccept(this)' data-id='$data->id'><span class='fa fa-check'></span></a>";
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
        return 'Acceptance_' . date('YmdHis');
    }
}
