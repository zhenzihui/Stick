<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class LoginCheck
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
        if(Auth::guest())
        {
          $request->session()->put("intent",$request->getRequestUri());
            return redirect(url('/login'));
        }
        return $next($request);
    }
}
