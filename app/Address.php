<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Address extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "street_address",
        "city",
        "landmark",
        "state",
        "country",
        "pincode"
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
