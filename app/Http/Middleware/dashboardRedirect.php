<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardRedirect
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
        if(Auth::user()->role == 0){
            return redirect()->route('student'); 
        }
        if (Auth::user()->role == 1) {
            return redirect()->route('teacher.schedule');
        }
        if (Auth::user()->role == 2) {
            return redirect()->route('student.teacher');
        }
        return $next($request);
    }
}
