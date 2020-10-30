<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');

Route::middleware('auth')->group(function () {

    Route::get('/admin', 'AdminsController@index')->name('admin.index');

    Route::get('/admin/posts/', 'PostController@index')->name('post.index');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');

    Route::delete('/admin/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy'); //Model-route-binding
    Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->name('post.edit');

    Route::put('admin/users/{user}/update', 'UserController@update')->name('user.profile.update');
    Route::delete('admin/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');
});
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');

Route::middleware('role:ADMIN', 'auth')->group(function () {
    //Kernelに登録したroleミドルウェアを適用、userのroleがAdminだったらアクセス可となる
    Route::get('admin/users', 'UserController@index')->name('users.index');
});
Route::middleware(['can:view,user'])->group(function () {
    //can:でUserPolicyに設定したメソッドを定義する
    Route::get('admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
