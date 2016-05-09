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
        return $this->hasMany('App\MemberRecord');
    }

    public function clan()
    {
        return $this->belongsTo('App\Clan');
    }

    /**
     * diff 取得某欄位與上一次記錄的差異
     *
     * @param string $column
     * @return int|float
     */
    public function diff($column)
    {
        if (!in_array($column, $this->fillable)) {
            throw new \Exception('No such column: ' . $column);
        }
        $record = $this->records()->where($column, "!=", $this->$column)->orderBy('created_at', 'DESC')->first();
        if (!$record) {
            return 0;
        }
        return $record->$column - $this->$column;
    }
}
