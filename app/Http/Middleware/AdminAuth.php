<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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
        if(session('admin') == '')
        {
            return redirect('admin/login')->with('error','Admin not logged  in');
        }
        // check if already logged in
        if(session('admin') <> "" && $request->path()=='admin/login' )
        {
            session()->flash('success','Admin already Signed in');
            return redirect('admin');
        }

        return $next($request);
    }
}
