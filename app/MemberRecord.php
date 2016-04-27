<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberRecord extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
