<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function records()
    {
        return $this->hasMany('App\Member');
    }
}
