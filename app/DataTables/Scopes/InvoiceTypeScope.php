<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class InvoiceTypeScope implements DataTableScope
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
        if (array_key_exists('form_type', $this->data)) {
            return $query->where('form_type_id', $this->data['form_type']);
        } else {
            $query;
        }

    }
}
