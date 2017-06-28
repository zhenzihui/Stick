<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
class RelationController extends Controller
{
    public function setUserRelation()
    {
        if(Auth::check())
        {
            $user=Auth::user();
            $users= User::where('role','!=',$user->role)->get();

            return view('setUserRelation',['user'=>$user,'users'=>$users]);
        }
        return back();
    }

    public function setUserGuardianRelation(Request $request)
    {

        if(Auth::user()->role=='user')
        {
            $guardians=$request->get('guardian');
            Auth::user()->guardians()->sync($guardians);
        }else
            {
                $users=$request->get('user');
                Auth::user()->users()->sync($users);

            }

               return redirect(url('setinfo'));


    }
    public function detachRelation(Request $request)
    {
        if(Auth::user()->role=='user')
        {
            $guardians=$request->get('guardian');
            Auth::user()->guardians()->detach($guardians);
        }else
        {
            $users=$request->get('user');
            Auth::user()->users()->detach($users);

        }
        return redirect(url('home'));

    }

}
