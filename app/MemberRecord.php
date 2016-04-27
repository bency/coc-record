<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberRecord extends Model
{
    protected $fillable = [
        'tag',
        'name',
        'role',
        'expLevel',
        'league',
        'trophies',
        'clanRank',
        'previousClanRank',
        'donations',
        'donationsReceived',
    ];
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
