<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clan extends Model
{
    protected $fillable = ['tag', 'name'];
    public function records()
    {
        return $this->hasMany('App\ClanRecord');
    }

    public function members()
    {
        return $this->hasMany('App\Member');
    }
}
