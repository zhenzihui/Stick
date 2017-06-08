<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Stick;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','location','use_count','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function users()
    {
        return $this->belongsToMany($this,'user_relation','guardian_id','user_id');
    }
    public function guardians()
    {
        return $this->belongsToMany($this,'user_relation','user_id','guardian_id');
    }
    public function sticks()
    {
        return $this->belongsToMany(Stick::class,'user_stick');
    }




}
