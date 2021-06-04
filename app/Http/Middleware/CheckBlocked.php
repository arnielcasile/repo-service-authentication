<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->guard()->user()->blocked_until && now()->lessThan(auth()->guard()->user()->blocked_until)) {
            $blocked_days = now()->diffInDays(auth()->guard()->user()->blocked_until); 
            $message = 'Your account has been suspended for '.$blocked_days.' '.Str::plural('day', $blocked_days).'. Please contact administrator.';
            auth()->guard()->logout();     
            return response()->json(['error' => $message], 401); 
        }

        return $next($request);
    }
}
