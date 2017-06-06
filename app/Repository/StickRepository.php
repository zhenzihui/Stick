<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/6
 * Time: 10:55
 */

namespace App\Repository;


class StickRepository
{
    public function index($num_per_page)
    {
       return Stick::where('id','>',0)->get()->paginate($num_per_page);
    }
}