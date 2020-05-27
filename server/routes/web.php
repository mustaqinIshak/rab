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
Route::get('/rabs/{id}','RabController@show') ;
Route::get('/rabs/edit/{id}','RabController@edit') ;
Route::get('/rabs/create','RabController@create');
Route::post('/rabs','RabController@store');
Route::patch('/rabs/{id}', 'RabController@update');
Route::delete('/rabs/{id}','RabController@destroy');

Route::get('/barangs/buat', 'BarangController@create');
Route::get('/barangs', 'BarangController@index');
Route::get('/barangs/{id}', 'BarangController@show');
Route::post('/barangs', 'BarangController@store');
Route::post('/barangs/update', 'BarangController@update');
Route::get('/barangs/destroy/{id}', 'BarangController@destroy');

Route::get('/rabBarangs/add/{id}', 'RabBarangController@create');
Route::post('/rabBarangs', 'RabBarangController@store');
Route::delete('/rabBarangs', 'RabBarangController@destroy');
