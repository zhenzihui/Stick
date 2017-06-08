<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStick extends Model
{
    protected $fillable=
        [
          'start_time','end_time','start_location','end_location','track',
        ];
    protected $table='user_stick';


}
