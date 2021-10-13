<?php


namespace App\Http\Controllers\user;


use App\Helpers\PaymentHelper;
use Illuminate\Http\Request;

class PaymentController
{
    private $paymentHelper;

    public function __construct(PaymentHelper $paymentHelper)
    {
        $this->paymentHelper = $paymentHelper;
    }

    public function pay(Request $request)
    {
        //todo: total amount must not be taken from user side
        $totalAmount = $request->get('amount');
        $this->paymentHelper->pay($totalAmount, auth()->user());
    }
}
