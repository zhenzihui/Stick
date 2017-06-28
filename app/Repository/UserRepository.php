<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 11:00
 */

namespace App\Repository;
use Auth;

class UserRepository
{
    function getRelations()
    {
        $user=Auth::user();
        if($user->role=="user")
        {
            return $user->guardians()->getResults();
        }
            return $user->users()->getResults();
    }
}