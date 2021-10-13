<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class Blacklist
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
        $blacklist = \App\Models\Blacklist::query()
            ->when(auth()->check(), function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })
            ->when($request->has('phone'), function ($query) use ($request) {
                $phone = $request->get('phone');
                $phone = parse_phone_number($phone);
                return $query->where('phone', $phone);
            })
            ->when(!auth()->check() && !$request->has('phone'), function ($query) use ($request) {
                return $query->where('ip_address', $request->ip());
            })
            ->orderBy('until_at', 'desc')->first();
//        if ($user) {
//            $blacklists = $user->blacklists()->orderBy('until_at', 'desc')->first();
//        } elseif ($request->has('phone')) {
//            $blacklists = \App\Models\Blacklist::where('phone', $request->get('phone'))->orderBy('until_at', 'desc')->first();
//        } else {
//            $blacklists = \App\Models\Blacklist::where('ip_address', $request->ip())->orderBy('until_at', 'desc')->first();
//        }

        $isBanned = false;
        if ($blacklist) {
            $until_at = Carbon::parse($blacklist->until_at);
            $isBanned = $until_at > Carbon::now();
        }

        if ($isBanned) {
            if ($request->ajax()) {
                return response()->json(['status' => 'banned']);
            } else {
                abort(403, 'Your account has been suspended.');
            }

        }
        return $next($request);
    }
}
