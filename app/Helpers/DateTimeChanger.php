<?php


namespace App\Helpers;

use App\Models\Blacklist;
use App\Models\Code;
use App\Models\TopUp;
use App\Models\UserDetail;
use App\Models\WrongCode;
use App\User;
use Illuminate\Database\Eloquent\Builder;

class DateTimeChanger
{
    public function fix($date_before){
        $this->changeDateTime(User::where('updated_at','<=',$date_before),['updated_at','created_at']);
        $this->changeDateTime(UserDetail::where('updated_at','<=',$date_before),['updated_at','created_at']);
        $this->changeDateTime(Code::where('updated_at','<=',$date_before)->wherenotnull('user_id'),['updated_at']);
        $this->changeDateTime(TopUp::where('updated_at','<=',$date_before),['updated_at','created_at']);
        $this->changeDateTime(WrongCode::where('updated_at','<=',$date_before),['updated_at','created_at']);
        $this->changeDateTime(Blacklist::where('updated_at','<=',$date_before),['updated_at','created_at','until_at']);


    }

    public function changeDateTime(Builder $query, $columns = ['updated_at'], $amountInMinute = 390)
    {
        $collections = $query->get();
        return $collections->each(function ($value) use ($columns, $amountInMinute) {
            foreach ($columns as $column) {
                if ($column === 'updated_at') {
                    $value->updated_at = $value->updated_at->addminutes($amountInMinute);
                } elseif ($column === 'created_at') {
                    $value->created_at = $value->created_at->addminutes($amountInMinute);
                }elseif ($column === 'until_at') {
                    $value->until_at = $value->until_at->addminutes($amountInMinute);
                }
            }
            $value->timestamps = false;
            $value->save();
        });
    }
}
