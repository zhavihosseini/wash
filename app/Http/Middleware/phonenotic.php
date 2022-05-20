<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class phonenotic
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
        if (! $request->user()->hasVerifiedPhone()) {
            return redirect()->route('verifyphone');
        }
        return $next($request);
    }
}
