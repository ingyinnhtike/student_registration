<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class DateBetweenMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $now = Carbon::now();
        if ($now->between(config('constants.start_date'), config('constants.end_date'), true)) {
            return $next($request);
        } else {
            abort(403, 'Please try again in allowed period.');
        }

    }
}
