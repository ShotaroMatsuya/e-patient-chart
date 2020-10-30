<?php
//usersページに関するrouteは全部ここにまとめる
use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');
Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::middleware('role:ADMIN', 'auth')->group(function () {
    //Kernelに登録したroleミドルウェアを適用、userのroleがAdminだったらアクセス可となる
    Route::get('/users', 'UserController@index')->name('users.index');
});
Route::middleware(['can:view,user'])->group(function () {
    //can:でUserPolicyに設定したメソッドとmodelをセットする
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
