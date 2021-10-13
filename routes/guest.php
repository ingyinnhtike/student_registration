<?php


Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/register', 'Auth\LoginController@showLoginForm')->name('register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/request-otp', 'Auth\LoginController@request_otp')->name('request_otp');
Route::post('/check-otp', 'Auth\LoginController@check_otp')->name('check_otp')->middleware('blacklist');

Route::post('/direct-login', 'Auth\LoginController@directLogin')->name("no-otp-login");


Route::get('/home', 'HomeController@index')->name('home');
