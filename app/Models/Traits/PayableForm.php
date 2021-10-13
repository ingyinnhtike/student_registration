<?php


namespace App\Models\Traits;


trait PayableForm
{
    public function isPaymentPending(){
        return $this->payment_receive_status === 0;
    }

    public function isPaymentApproved()
    {
        return $this->payment_receive_status === 1;
    }

    public function isPaymentRejected(){
        return $this->payment_receive_status === 2;
    }

    public function getPaymentRemark(){
        return $this->payment_receive_message;
    }

}
