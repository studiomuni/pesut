<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/management', 'HomeController@index')->name('home');
Route::get('/management-add', 'HomeController@index')->name('home');
Route::get('invoice', function(){
    return view('invoice');
});

// Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );

Route::get('contact', 'MessageController@form')->name('contact.form');
Route::post('send', 'MessageController@send')->name('contact.send');

//mamagement
Route::get('/api/getAllData', 'WoocomerceController@getAllData');
Route::get('/api/getData/{id}', 'WoocomerceController@getData');
Route::get('/api/delete/{id}', 'WoocomerceController@deleteData');
Route::get('/api/getCategories', 'WoocomerceController@getCategories');
Route::post('saveProduct', 'WoocomerceController@saveProduct')->name('contact.send');