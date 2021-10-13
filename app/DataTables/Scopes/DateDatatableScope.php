<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class DateDatatableScope implements DataTableScope
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where($this->data['date_type'], '>=', $this->data['start_date'])
            ->where($this->data['date_type'], '<=', $this->data['end_date']);
    }
}
