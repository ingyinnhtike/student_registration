<?php

namespace App\DataTables;


use App\Models\Enrollment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EnrollmentDataTable extends DataTable
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
            ->addColumn('action', function ($data){
                return $this->getActions($data);
            })
            ->editColumn('Submitted At', function ($data) {
                return $data->created_at;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\EnrollmentDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Enrollment $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('enrollmentdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('export'),
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
                ->width(80)
                ->addClass('text-center'),
            Column::make('id'),
            Column::make('Submitted At'),

        ];
    }

    public function getActions($data)
    {
        return "<a class='btn btn-primary' onclick='approve(this)' data-enrollment='$data->id'><span class='fa fa-check'></span></a>";
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Enrollment_' . date('YmdHis');
    }
}
