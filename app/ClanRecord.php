<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClanRecord extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'badgeUrls',
        'location',
        'warFrequency',
        'clanLevel',
        'warWins',
        'warWinStreak',
        'clanPoints',
        'requiredTrophies',
        'members',
    ];
    public function clan()
    {
        return $this->belongsTo('App\Clan');
    }
    public function getBadgeUrl($badgeUrl, $type = 'large')
    {
        $url = json_decode($badgeUrl, true)[$type];
        return $url;
    }
}
