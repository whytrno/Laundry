<?php

namespace App\Http\Middleware;

use Auth;
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
        
        if (Auth::user()->level == 'admin') { 
            return $next($request);
        } elseif (Auth::user()->level == 'mitra') { 
            return back()->with('error', 'Cannot access to restricted page');
        } elseif (Auth::user()->level == 'customer') { 
            return back()->with('error', 'Cannot access to restricted page');
        }

    }
}
