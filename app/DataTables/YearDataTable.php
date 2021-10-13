<?php

namespace App\DataTables;

use App\Models\Year;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class YearDataTable extends DataTable
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
            });
    }

    public function query(Year $model)
    {
        return $model->newQuery()
            ->withCount('courses');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('year-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
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
            'name' => [
                'title' => 'မြန်မာအမည်',
            ],
            'name_en' => [
                'title' => 'English name',
            ],
            'courses_count' => [
                'title' => 'သင်တန်းအရေအတွက်',
                'searchable' => false,
            ],
        ];
    }


    private function getActions($data)
    {
        $edit_route = route('admin.year.edit', $data->id);
        $delete_route = route('admin.year.destroy', $data->id);
        $delete_message = "{$data->name} သင်တန်းနှစ် ကိုဖျက်ပီးလျှင် ပြန်ပြင်ဆင်၍ မရနိုင်ပါ။";
        return "<a class='btn btn-outline-primary' href='$edit_route' ><span class='fa fa-edit'></a>" .
            "<button class='btn btn-outline-danger confirm-delete' data-url='$delete_route' data-message='$delete_message'><span class='fa fa-trash'></button>";
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Year_' . date('YmdHis');
    }
}
