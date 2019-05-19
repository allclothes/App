<?php

Route::group(['namespace' => 'Site'], function(){

Route::get('/', 'SiteController@index');
Route::get('/cadastroUsuario', 'SiteController@usersCadastro');
Route::get('/loginUsuario', 'SiteController@usersLogin');

});


Route::get('/product/{url}', 'productsController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
