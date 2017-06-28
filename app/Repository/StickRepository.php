<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/6
 * Time: 10:55
 */

namespace App\Repository;
use App\Stick;
use Illuminate\Http\Request;

class StickRepository
{
    public function index($num_per_page)
    {
       return Stick::where('id','>',0)->paginate($num_per_page);
    }
    public function all()
    {
        $sticks=Stick::all();
        $locations=[];
        foreach ($sticks as $stick)
        {
            $locations[]=['id'=>$stick->id,'location'=>$stick->location];
        }
        return json_encode($locations);
    }

    public function create(Request $request)
    {
        $number=$request->get('number');
        $status=$request->get('status');
        $location=explode(',',$request->get('location'));
        $baseLatitude=$location[0];
        $baseLongitude=$location[1];
        for($i=0;$i<$number;$i++)
        {
            $newLatitude=$baseLatitude+random_int(-5,5)/1000;
            $newGratitude=$baseLongitude+random_int(-5,5)/1000;
            Stick::create(
                [
                    'status'=>$status,
                    'location'=>$newLatitude.",".$newGratitude,
                ]
            );
        }
    }
}