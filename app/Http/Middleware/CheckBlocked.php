<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CheckBLocked
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->blocked_until && now()->lessThan(auth()->user()->blocked_until)) {
            $blocked_days = now()->diffInDays(auth()->user()->blocked_date);
            $message = 'Your account has been suspended . Please contact administrator.';
            auth()->logout();
            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
