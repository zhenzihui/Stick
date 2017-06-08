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
        $user_stick=UserStick::where('id','=',Auth::user()->id)->latest()->get();

        $id=$user_stick->toArray()[0]['stick_id'];
        $stick=Stick::find($id);

        return view('stick.inUse',compact('stick'));
    }

}
