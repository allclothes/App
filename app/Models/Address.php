<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "address";

    protected $fillable = [
        'contry', 'state', 'city', 'zip-code', 'address','user_id'
    ];

    
}
