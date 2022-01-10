<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeDOB
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
      if (Auth::check()) {
        if (Auth::user()->dob == '1990-01-01') {
          return redirect('change-dob');
        }
      }else {
        return redirect('/');
      }
      return $next($request);
    }
}
