<?php

Route::get('/', 'controller@index');

Route::get('/search', 'productsController@searchProduct')->name('search');

Route::get('/menu', function(){
    return view('smart_menu');
});


Route::prefix('/control-panel')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/payments/history', 'HomeController@paymentHistory')->name('paymentHistory');
    

    Route::resource('store', 'storeController');
    Route::resource('product', 'productsConptroller');

    route::get('/{x}', function(){
        return redirect('/control-panel');
    });
    

});

Auth::routes();
route::post('/api/addToCart', 'productsController@addCarrinho')->name("addCart");
route::post('/api/delToCart', 'productsController@DelCarrinho')->name("delCart");
route::post('/api/checkout/confirm', 'productsController@storeCart')->name('storeCheckout');
route::get('/api/cleanSession', 'productsController@cleanCarrinho');
route::get('/checkout/2', 'productsController@confirmCheckout');

route::get('/checkout', 'productsController@checkout');
Route::get('/getpollget', 'productsController@getBack');
Route::get('/{name}', 'storeController@show');
Route::get('/{store}/{url}', 'storeController@showProduct');

