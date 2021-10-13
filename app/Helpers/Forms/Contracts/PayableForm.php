<?php


namespace App\Helpers\Forms\Contracts;


use Illuminate\Database\Eloquent\Model;

interface PayableForm
{
    public function saveInvoice($form, $status, $message = null, $payment_received_user = null);

}
