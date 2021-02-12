<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/send/mail', 'HomeController@sendMail')->name('send-mail');

Route::post('/send/empty/mail', 'HomeController@sendEmptyMail')->name('send-empty-mail');


Route::post('/update/user/icon', 'HomeController@updateUserIcon')->name('update-icon');

Route::get('/clear/user/icon', 'HomeController@clearUserIcon')->name('clear-icon');





