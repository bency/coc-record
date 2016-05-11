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
    public function formatClanRecord(ClanRecord $clan_record)
    {
        $badge_url = json_decode($clan_record->badgeUrls);
        return (Object) $ret = [
            'id'          => $clan_record->id,
            'clan_id'     => $clan_record->clan_id,
            'name'        => $clan_record->name,
            'large_icon'  => $badge_url->large,
            'medium_icon' => $badge_url->medium,
            'small_icon'  => $badge_url->small,
            'level'       => $clan_record->clanLevel,
            'wins'        => $clan_record->warWins,
            'win_streak'  => $clan_record->warWinStreak,
            'members'     => $clan_record->members,
        ];
    }
}
