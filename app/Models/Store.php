<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';

    protected $fillable = [
        'name', 'description', 'profileimg', 'backgroundimg'
    ];

    protected $rules = [
        'name'  =>  'required|string|unique:store|min:5|max:25',
        'description'  => 'max:90|string',
        'profileimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'backgroundimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ];
}
