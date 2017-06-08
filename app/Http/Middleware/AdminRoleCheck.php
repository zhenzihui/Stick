<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminRoleCheck
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
        if(!Auth::guest()||Auth::user()!=null)
        {
            if(Auth::user()->role=="admin"){
                return $next($request);
            }
        }

return abort('403','你无权管理这些拐杖');
    }
}
