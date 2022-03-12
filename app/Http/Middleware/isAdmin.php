<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        // abort here
        if (!auth()->check() || !auth()->user()->is_admin) {
            /**
             * Aborts the current request with a 403 error.
             * @param  string|null  $message
             * @return void
             */
            return redirect()->route('dashboard')->with('notif', 'You try to acess Administrator page! Only Administrator can acess that page.');
        }

        return $next($request);
    }
}
