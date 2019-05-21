<?php

Route::get('/', function(){
    return view('index');
});

Route::resource('product', 'productsController');

Route::get('/menu', function(){
    return view('smart_menu');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


