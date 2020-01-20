<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user','DemoController@userDemo')->name('user');
    Route::get('/semacesso', 'Democontroller@semAcesso');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/admin','DemoController@adminDemo')->name('admin');    
    });
});



Route::get('/home', 'HomeController@index')->name('home');
