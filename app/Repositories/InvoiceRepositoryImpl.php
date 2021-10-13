<?php


namespace App\Repositories;


use App\Models\Invoice;
use App\Repositories\Contracts\InvoiceRepository;

class InvoiceRepositoryImpl extends BaseRepositoryImpl implements InvoiceRepository
{
    function model(): string
    {
        return Invoice::class;
    }

    function relationToOwner(): string
    {
        return '';
    }

    function prefix()
    {
        return '';
    }

    function create($data, $model_owner = null)
    {
        if ($model_owner === null) {
            $model_owner = auth()->user();
        }

        $model_owner->receivedInvoices()->create($data);
    }

    function update($data, $model, $model_owner = null)
    {
        if ($model_owner === null) {
            $model_owner = auth()->user();
        }

        $model->update($data);
    }

    function hydrate($data)
    {
        $model = $this->generateModel($data);
        return $model;
    }

}
