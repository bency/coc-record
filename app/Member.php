<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['tag', 'name'];
    public function records()
    {
        return $this->hasMany('App\Member');
    }
}
