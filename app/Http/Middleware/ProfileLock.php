<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileLock
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
        // dd('asda');
        // if(Auth::check())
        // {
        //     dd(Auth::user()->lock_profile_date);
        //     if(date('Y-m-d') < Auth::user()->lock_profile_date)
        //     {
        //         redirect('lock-profile');
        //     }
        // }
      
        // if(Auth::check()){
            // return redirect('/');
            // $user = Auth::user();
            // if(date('Y-m-d') > $user->lock_profile_date)
            // {
            //     return redirect('lock-profile')->with('message', 'Your profile has been locked please pay anual fee.');
            // }
        // }
        return $next($request);
    }
}
