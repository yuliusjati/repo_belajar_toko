<?php

use Illuminate\Http\Request;

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::group(['middleware' => ['jwt.verify']], function ()
{
  Route::group(['middleware' => ['api.superadmin']], function(){
    Route::delete('/orders/{id}', 'OrdersController@destroy');
    Route::delete('/product/{id}', 'ProductController@destroy');
    Route::delete('/customers/{id}', 'CustomersController@destroy');
  });
  Route::group(['middleware' => ['api.admin']], function (){
    Route::post('/product', 'ProductController@store');
    Route::put('/product/{id}', 'ProductController@update');

    Route::put('/orders/{id}', 'OrdersController@update');
    Route::post('/orders', 'OrdersController@store');

    Route::post('/customers', 'CustomersController@store');
    Route::put('/customers/{id}', 'CustomersController@update');
  });

Route::get('/customers', 'CustomersController@show');
Route::get('/customers/{id}', 'CustomersController@detail');

Route::get('/orders', 'OrdersController@show');
Route::get('/orders/{id}', 'OrdersController@detail');

Route::get('/product', 'ProductController@show');
Route::get('/product/{id}', 'ProductController@detail');
});
