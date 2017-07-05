<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;
class FirstLoginCheck
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
        $uri=$request->session()->get('intent');
        if(Auth::guest())
        {
            return back();
        }
        else
            {
                $user=Auth::user();
                if($user->role=='user'&&$user->firstlogin=='T')
                {
                    return $next($request);
                }
            }
       return redirect(url($uri));
    }
}
