<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    protected $table = "products_history";

    protected $fillable = [
        'store_id', 'user_id', 'cart_id', 'status'
    ];

}
