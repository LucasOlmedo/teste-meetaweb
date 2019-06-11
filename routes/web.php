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

Route::get('/', 'UsuarioController@index');

Route::group(['prefix' => 'usuarios'], function () {
    Route::get('/', 'UsuarioController@index')->name('index');
    Route::get('/create', 'UsuarioController@create')->name('create');
    Route::post('/store', 'UsuarioController@store')->name('store');
    Route::delete('/{id}', 'UsuarioController@destroy')->name('delete');
});