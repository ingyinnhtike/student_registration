<?php

namespace App\DataTables\Scopes;

use Auth;
use Yajra\DataTables\Contracts\DataTableScope;

class AcceptanceTypeScope implements DataTableScope
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
        $type = array_key_exists('accept_type', $this->data) ? $this->data['accept_type'] : '';
        $user_id = Auth::User()->id;
        if($user_id == 3)
        {
            return $query->when($type === 'approve',function ($query){
                $query->where('approved_status',$this->data['status'])->where('university_status',1);
            })->when($type === 'payment',function ($query){
                $query->where('approved_status',1)
                ->where('university_status',1)
                    ->where('payment_receive_status',$this->data['status']);
            });
        }else if($user_id == 1){
            return $query->when($type === 'approve',function ($query){
                $query->where('approved_status',$this->data['status'])->where('university_status',0);
            })->when($type === 'payment',function ($query){
                $query->where('approved_status',1)
                ->where('university_status',0)
                    ->where('payment_receive_status',$this->data['status']);
            });
        }else{
            return $query->when($type === 'approve',function ($query){
                $query->where('approved_status',$this->data['status']);
            })->when($type === 'payment',function ($query){
                $query->where('approved_status',1)
                    ->where('payment_receive_status',$this->data['status']);
            });

        }
        
    }
}
