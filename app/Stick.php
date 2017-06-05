<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stick extends Model
{
    protected $fillable=
        [
          'status','location','use_count'
        ];
}
