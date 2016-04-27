<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'tag',
        'name',
        'role',
        'expLevel',
        'trophies',
        'clanRank',
        'previousClanRank',
        'donations',
        'donationsReceived',
    ];
    public function records()
    {
        return $this->hasMany('App\Member');
    }

    public function clan()
    {
        return $this->belongsTo('App\Clan');
    }
}
