<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OwnerLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (@auth()->user()->level == 'owner' || @auth()->user()->level == 'user') {
            return $next($request);
        } else {
            return redirect()->route('home')->with('permission', 'sorry, the page just can asscess by school owner!');
        }

    }
}
