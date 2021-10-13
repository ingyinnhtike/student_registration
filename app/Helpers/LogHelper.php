<?php


namespace App\Helpers;


trait LogHelper
{
    protected function recordLog($description, $log_name, $properties)
    {
        activity($log_name)
            ->by(auth()->user())
            ->withProperties($properties)
            ->log($description);
    }
}
