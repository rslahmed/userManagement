<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::middleware(['active_user', 'auth'])->group(function () {
//home
    Route::get('/home', 'HomeController@index')->name('home');
//user
    Route::get('/user', 'UserController@index')->name('user.all');
    Route::get('/user/add', 'UserController@add')->name('user.add');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::get('/user//trash', 'UserController@trash')->name('user.trash');
    Route::get('/user/{user}/view', 'UserController@view')->name('user.view');
    Route::get('/user/{user}/delete', 'UserController@delete')->name('user.delete');
    Route::get('/user/{user}/destroy', 'UserController@destroy')->name('user.destroy');
    Route::get('/user/{user}/restore', 'UserController@restore')->name('user.restore');
    Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/user/{user}/update', 'UserController@update')->name('user.update');
    Route::post('/user/{user}/update_password', 'UserController@updatePassword')->name('user.updatePassword');

//role
    Route::get('/role/', 'RoleController@index')->name('role.all');
    Route::get('/role/add', 'RoleController@add')->name('role.add');
    Route::post('/role/store', 'RoleController@store')->name('role.store');
    Route::get('/role/{role}/view', 'RoleController@view')->name('role.view');
    Route::get('/role/{role}/destroy', 'RoleController@destroy')->name('role.destroy');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('role.edit');
    Route::post('/role/{role}/update', 'RoleController@update')->name('role.update');

//activity log
    // TODO work on activity log
    Route::post('/activity/', 'HomeController@index')->name('activity.log');
    Route::post('/activity/{activity}/delete', 'HomeController@index')->name('activity.delete');
});
