<?php


namespace App\Helpers;

use App\Repositories\contracts\CodeContract;
use App\Repositories\contracts\WrongCodeContract;

class CodeValidator
{

    public function validate($code)
    {
        if (is_array($code)) {
            $codes = collect($code);
            /*$codes = $codes->filter(function ($code) {
                return !isset($code->user);
            });*/

            return $codes;
        } else {
            //if there is no user, code is valid
            /*return $code->user === null ? $code : null;*/
            return $code;
        }
    }

    public function isValid($code)
    {
        $status = false;
        if ($code !== null /*&& $code->user === null*/) {
            $status = true;
        }

        return $status;
    }

    public function recordInvalidCodes(array $all, $validCodes, WrongCodeContract $wrongCodeContract)
    {

        foreach ($all as $code) {
            $isContain = $validCodes->contains(function ($value, $key) use ($code) {
                return $value->code === $code;
            });

            if (!$isContain) {
                $wrongCodeContract->save($code);
            }
        }
    }

}
