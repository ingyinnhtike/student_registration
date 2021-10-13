<?php

namespace App\DataTables;


use App\Models\Course;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CourseDataTable extends DataTable
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
            ->editColumn('status', function ($data) {
                return $data->statusString;
            })
            ->addColumn('action', function ($data) {
                return $this->getActions($data);
            });
    }


    public function query(Course $model)
    {
        return $model->newQuery()
            ->withCount('appliedCourses')
            ->withCount('fees')
            ->with('year', 'major');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('course-table')
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
            'id',
            'year.name' => [
                'title' => 'သင်တန်းနှစ်',
            ],
            'major.name' => [
                'title' => 'အဓိကဘာသာ',
                
            ],
            'applied_courses_count' => [
                'title' => 'ကျောင်းသားဦးရေ',
                'searchable' => false,
            ],
            'fees_count' => [
                'title' => 'လခအမျိုးအစားများ',
                'searchable' => false,
            ],
            'status' => [
                'title' => 'ဖွင့်/ပိတ်',
            ],


        ];
    }

    private function getActions($data)
    {
        $edit_route = route('admin.course.edit', $data->id);
        $delete_route = route('admin.course.destroy', $data->id);
        $delete_message = "{$data->year->name} {$data->major->name} ကိုဖျက်ပီးလျှင် ပြန်ပြင်ဆင်၍ မရနိုင်ပါ။";
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
        return 'Course_' . date('YmdHis');
    }

    public function excel()
    {
        //leave this method empty to disable exporting excel
    }

}
