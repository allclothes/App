<?php

Route::get('/', 'controller@index');

Route::get('/search', 'productsController@searchProduct')->name('search');

Route::get('/menu', function(){
    return view('smart_menu');
});


Route::prefix('/control-panel')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    

    Route::resource('store', 'storeController');
    Route::resource('product', 'productsController');

    

});

Auth::routes();
Route::get('/getpollget', 'productsController@getBack');
Route::get('/{name}', 'storeController@show');
Route::get('/{store}/{url}', 'storeController@showProduct');

