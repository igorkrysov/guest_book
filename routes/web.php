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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get_captcha', 'MessageController@get_captcha')->name('get_captcha');


Route::get('/create', 'MessageController@create')->name('create')->middleware('auth');
Route::post('/store', 'MessageController@store')->name('store')->middleware('auth');;
Route::get('/messages', 'MessageController@index')->name('index')->middleware('admin');;
