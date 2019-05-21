<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [ 
        'name', 'amount', 'cost', 'category', 'user_id','image'
    ];

    protected $rules = [
        'name'      =>  'required|string|min:3|max:50',
        'amount'    =>  'required|integer|max:99',
        'cost'      =>  'required',
        'images' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category'  =>  'required'

    ];
    
}
