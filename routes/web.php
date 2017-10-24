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

Route::get('/','HomeController@index');
Route::get('/registration/','ContentController@registration');
Route::get('/registration/create','ContentController@create');
Route::post('/registration/' , 'ContentController@store');
Route::get('/registration/{ID}','ContentController@show');