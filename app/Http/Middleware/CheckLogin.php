<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if(Auth::check()){
        //     return redirect()->route('quantri');
        // }
        dd($request->username);
        if($request->username == 'admin' && $request->password == '123456'){
            //echo 1234;die;
            return $next($request);
        }
        else
            return redirect()->back();
    }
}
