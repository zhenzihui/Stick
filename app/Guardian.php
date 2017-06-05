<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable=[
      'guardian_id','user_id'
    ];
}
