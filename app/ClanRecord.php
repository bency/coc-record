<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClanRecord extends Model
{
    public function clan()
    {
        return $this->belongsTo('App\Clan');
    }
}
