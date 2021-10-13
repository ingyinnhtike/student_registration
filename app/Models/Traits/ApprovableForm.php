<?php


namespace App\Models\Traits;


trait ApprovableForm
{
    public function isPending(){
        return $this->approved_status === 0;
    }

    public function isApproved()
    {
        return $this->approved_status === 1;
    }

    public function isRejected(){
        return $this->approved_status === 2;
    }
}
