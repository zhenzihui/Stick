<?php

namespace App\Http\Controllers;

use App\Stick;
use App\UserStick;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Broadcast;

class StickUseController extends Controller
{
    public function unlock($id){
      $stick = Stick::find($id);
      return view('stick.unlock',compact('stick'));
    }

    public function postUnlock(Request $request)
    {
        $location=$request->get('start_location');

        $sid=$request->get('id');
        $stick=Stick::find($sid);
        $stick->status='F';
        $stick->location=$location;
        $stick->use_count+=1;
        $stick->save();
        Auth::user()->increment('use_count');

        Auth::user()->sticks()->attach($sid,['start_location'=>$location,
            'end_location'=>'',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'start_time'=>Carbon::now(),
        ]);
return redirect(url('lock'));

    }
    public function lock()
    {
        $user_stick=UserStick::lastOne(Auth::user());

        $id=$user_stick->toArray()[0]['stick_id'];
        $stick=Stick::find($id);

        return view('stick.inUse',compact('stick'));
    }
    public function postLock(Request $request)
    {
        $location=$request->get('location');
        $sid=$request->get('id');
           $stick= Stick::find($sid);
           $stick->location=$location;
           $stick->status='T';
           $stick->save();
        $user_stick=UserStick::lastOne(Auth::user());
        $id=$user_stick->toArray()['id'];
        $user_stick=UserStick::find($id);
        $user_stick->end_location=$location;
        $user_stick->end_time=Carbon::now();
        $user_stick->updated_at=Carbon::now();
        $user_stick->save();


    }

}
