<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";

    protected $fillable = [
        'history_id', 'product_id', 'quantity', 'cost'
    ];
}
