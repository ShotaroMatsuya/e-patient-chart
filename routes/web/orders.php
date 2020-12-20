<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/create/{post}', 'OrderController@create')->name('orders.create');
    Route::post('/orders', 'OrderController@store')->name('orders.store');

    Route::delete('/orders/{order}/destroy', 'OrderController@destroy')->name('orders.destroy'); //Model-route-binding
    Route::patch('/orders/{order}/update', 'OrderController@update')->name('orders.update');
    Route::get('/orders/{order}/edit', 'OrderController@edit')->name('orders.edit');
});
