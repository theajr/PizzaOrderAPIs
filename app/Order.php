<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }
}
