<?php


namespace App\Helpers;


use App\Models\Blacklist;
use App\Models\WrongOtp;
use App\User;
use Carbon\Carbon;
use function Complex\theta;

class Banning
{

    public $interval = 0;
    public $wrong_code_per_interval = 0;
    public $min_ban_time_in_minute = 0;
    public $max_ban_time_in_minute = 0;
    public $max_time_to_look = 0;
    public $wrong_type = null;

    public function shouldBan($whom)
    {
        if ($whom) {
            $now = Carbon::now();
            $wrong_type = $this->getWrongType();

            if ($wrong_type === 'otp') {
                $wrongCodes = $this->getWrongOtps($whom);
            } else {
                $wrongCodes = $this->getWrongCodes($whom);
            }

            $ban_level = 0;

            $interval = $this->getInterval();
            $wrong_code_per_interval = $this->getWrongCodePerInterval();

            while ($wrongCodes->where('created_at', '<=', $now)
                    ->where('created_at', '>=', $now->subMinutes($interval))
                    ->count() >= $wrong_code_per_interval) {
                $ban_level++;
            }

            if ($ban_level > 0) {
                $until = $this->calculateBanPeriodInMinute($ban_level);
                if ($until > 0) {
                    $until = Carbon::now()->addMinutes($until);
                    return $this->initBan($until, $whom);
                }
            }
        }
    }

    public function liftBan($whom)
    {
        if ($whom) {
            $blacklist = null;
            if ($whom instanceof Blacklist) {
                $blacklist = $whom;
            } else {
                $blacklist = Blacklist::when($whom, function ($query, $whom) {
                    if ($whom instanceof User) {
                        return $query->where('user_id', $whom->id);
                    } elseif (is_string($whom)) {
                        return $query->where('ip_address', $whom);

                    } else {
                        return $query->where('user_id', $whom);
                    }

                })->orderby('updated_at', 'desc')
                    ->limit(1)
                    ->first();
            }
            if ($blacklist) {
                $blacklist->until_at = Carbon::now();
                return auth()->user()->liftedBans()->save($blacklist);
            }
        } else {
            return null;
        }
    }

    private function initBan($until_at, $whom)
    {
        if ($whom === null) {
            return false;
        }

        $data = [
            'until_at' => $until_at,

        ];
        if ($whom !== null) {
            if ($whom instanceof User) {
                $data['user_id'] = $whom->id;
            } elseif (is_string($whom) && $this->getWrongType() === 'otp') {
                $data['phone'] = $whom;
                $data['ip_address'] = request()->ip();
            } elseif (is_string($whom)) {
                $data['ip_address'] = $whom;

            } else {
                $data['user_id'] = $whom;
            }

        }
        return Blacklist::create($data);
    }


    private function calculateBanPeriodInMinute($ban_level)
    {
        if ($ban_level > 0) {
            $min_period = $this->getMinimumBanTimeInMinute();
            $max_period = $this->getMaximumBanTimeInMinute();

            $duration = ($ban_level ** ($ban_level - 1)) * $min_period;

            if ($duration < $min_period) return $min_period;
            elseif ($duration > $max_period) return $max_period;
            else return $duration;
        } else {
            return -1;
        }
    }

    private function getWrongCodes($whom)
    {
//        return WrongCode::when($whom, function ($query, $whom) {
//            if ($whom instanceof User) {
//                return $query->where('user_id', $whom->id);
//            } elseif (is_string($whom)) {
//                return $query->where('ip_address', $whom);
//
//            } else {
//                return $query->where('user_id', $whom);
//            }
//
//        })->orderby('created_at')
//            ->where('created_at', '>', Carbon::now()->subMinute($this->getMaximumTimeToLook()))
//            ->get();
    }

    private function getWrongOtps($phone)
    {
        return WrongOtp::where('phone', $phone)->orderby('created_at')
            ->where('created_at', '>', Carbon::now()->subMinutes($this->getMaximumTimeToLook()))
            ->get();
    }


    //getter and setter
    public function getInterval()
    {
        return $this->interval !== 0 ? $this->interval : config('constants.interval');
    }

    public function getWrongCodePerInterval()
    {
        return $this->wrong_code_per_interval !== 0 ? $this->wrong_code_per_interval : config('constants.wrong_code_per_interval');
    }

    public function getMinimumBanTimeInMinute()
    {
        return $this->min_ban_time_in_minute !== 0 ? $this->min_ban_time_in_minute : config('constants.min_ban_time_in_minute');
    }

    public function getMaximumBanTimeInMinute()
    {
        return $this->max_ban_time_in_minute !== 0 ? $this->max_ban_time_in_minute : config('constants.max_ban_time_in_minute');
    }

    public function getMaximumTimeToLook()
    {
        return $this->max_time_to_look !== 0 ? $this->max_time_to_look : config('constants.max_time_to_look_in_minute');
    }

    public function getWrongType()
    {
        return $this->wrong_type !== null ? $this->wrong_type : 'default';
    }


}
