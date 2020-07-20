<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $dates = ['date'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
