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

Route::get('/form/{id}','FormController@index')->name('form');
Route::get('/form/{id}/data','FormController@data')->name('formdata');
Route::get('/form/{id}/edit','FormController@edit')->name('formeidt');