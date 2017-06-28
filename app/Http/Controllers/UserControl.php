<?php
namespace App\Http\Controllers;
use Auth;
use App\User;
class UserControl
{
   protected $user;
   public function __construct()
   {
       $this->user=Auth::user();
   }

    public function getRelation()
    {

        if($this->isUser($this->user))
        {
            return $this->user->guardians();
        }
        return $this->user->users();
    }
    public function detach(User $user)
    {
        if($this->isUser($this->user))
        {
            $this->user->guardians()->detach($user->id);
        }
        else
            {
                $this->user->users()->detach($user->id);
            }

    }

    public function isUser(User $user)
    {
        if($user->role=="user")
        {
            return true;
        }
        return false;
    }

}