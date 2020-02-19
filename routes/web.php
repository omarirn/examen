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

Route::resource('/empleados', 'EmpleadoController')->middleware('auth');
Route::post('/empleados/activar', 'EmpleadoController@cambiarEstatus')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
