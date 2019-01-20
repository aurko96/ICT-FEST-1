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
})->name('front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register_mo', 'MathOlympiadController@create')->name('register_mo');
Route::get('/mo_list', 'MathOlympiadController@index')->name('mo_list');
Route::post('/mo_list', 'MathOlympiadController@store')->name('store_mo');
Route::get('/delete_mo/{id}','MathOlympiadController@delete');
