<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', 'OrderController@index')->name('order.index');
    Route::get('/orders/create', 'OrderController@create')->name('order.create');
    Route::post('/orders', 'OrderController@store')->name('order.store');

    Route::delete('/orders/{order}/destroy', 'OrderController@destroy')->name('order.destroy'); //Model-route-binding
    Route::patch('/orders/{order}/update', 'OrderController@update')->name('order.update');
    Route::get('/orders/{order}/edit', 'OrderController@edit')->name('order.edit');
});
