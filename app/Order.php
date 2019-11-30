<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'address_id',
        'amount'
    ];

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
