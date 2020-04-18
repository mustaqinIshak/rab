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

Route::get('/rabs', 'RabController@index');

Route::get('/rabs/${id}','RabController@show') ;

Route::get('/rabs/create','RabController@create');

Route::post('/rabs/${id}','RabController@store');

Route::delete('/rabs/${id}','RabController@destroy');
