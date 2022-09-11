<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/results', 'ResultController@index')->name('results.index');
    Route::get('/results/create/{order}', 'ResultController@create')->name('results.create');
    Route::post('/results', 'ResultController@store')->name('results.store');

    // Route::delete('/results/{order}/destroy', 'OrderController@destroy')->name('results.destroy'); //Model-route-binding
    Route::patch('/results/{order}/update', 'ResultController@update')->name('results.update');
    Route::get('/results/{result}/edit', 'ResultController@edit')->name('results.edit');
});