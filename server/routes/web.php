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

Route::get('/', 'UserController@show');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');

Route::get('/rabs', 'RabController@index')->middleware('authentication');
Route::get('/rabs/{id}','RabController@show')->middleware('authentication');
Route::get('/rabs/edit/{id}','RabController@edit')->middleware('authentication');
Route::get('/rabs/create','RabController@create')->middleware('authentication');
Route::post('/rabs','RabController@store')->middleware('authentication');
Route::patch('/rabs/{id}', 'RabController@update')->middleware('authentication');
Route::delete('/rabs/{id}','RabController@destroy')->middleware('authentication');

Route::get('/barangs/buat', 'BarangController@create')->middleware('authentication');
Route::get('/barangs', 'BarangController@index')->middleware('authentication');
Route::get('/barangs/{id}', 'BarangController@show')->middleware('authentication');
Route::post('/barangs', 'BarangController@store')->middleware('authentication');
Route::post('/barangs/update', 'BarangController@update')->middleware('authentication');
Route::get('/barangs/destroy/{id}', 'BarangController@destroy')->middleware('authentication');

Route::get('/rabBarangs/add/{id}', 'RabBarangController@create')->middleware('authentication');
Route::get('/rabBarangs/barang/{id}', 'RabBarangController@showBarang')->middleware('authentication');
Route::post('/rabBarangs', 'RabBarangController@store')->middleware('authentication');
Route::delete('/rabBarangs/{id}/{rabId}', 'RabBarangController@destroy')->middleware('authentication');
