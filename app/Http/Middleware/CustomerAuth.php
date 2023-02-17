<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerAuth
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
        if(session('customer') == '')
        {
            return redirect('customer/login')->with('error','Customer not logged  in');
        }
        // check if already logged in
        if(session('customer') <> "" && $request->path()=='customer/login' )
        {
            session()->flash('msg','Customer already Signed in');
            return redirect('customer');
        }
        return $next($request);
    }
}
