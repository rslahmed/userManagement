<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
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

//role
    Route::get('/role/', 'HomeController@index')->name('role.all');
    Route::get('/role/add', 'HomeController@index')->name('role.add');
    Route::post('/role/store', 'HomeController@index')->name('role.store');
    Route::get('/role/{role}/view', 'HomeController@index')->name('role.view');
    Route::get('/role/{role}/delete', 'HomeController@index')->name('role.delete');
    Route::get('/role/{role}/edit', 'HomeController@index')->name('role.edit');
    Route::post('/role/{role}/update', 'HomeController@index')->name('role.update');

//activity log
    Route::post('/activity/', 'HomeController@index')->name('activity.log');
    Route::post('/activity/{activity}/delete', 'HomeController@index')->name('activity.delete');
});
