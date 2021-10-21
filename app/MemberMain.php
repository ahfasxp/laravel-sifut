<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberMain extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
