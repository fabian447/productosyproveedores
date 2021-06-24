<?php

use GuzzleHttp\Middleware;
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

Route::get('/', 'ProductosController@index')->middleware('auth')->name('productos.index');

Route::prefix('admin')->middleware('auth')->group( function(){

	Route::get('/productos', 'ProductosController@index')->name('productos.index');
	Route::post('/productos', 'ProductosController@store')->name('productos.store');
	Route::get('/productos/{id}/edit', 'ProductosController@edit')->name('productos.edit');
	Route::put('/productos/{id}', 'ProductosController@update')->name('productos.update');
	Route::get('/productos/{id}/destroy', 'ProductosController@destroy')->name('productos.destroy');

    Route::get('/proveedores', 'ProveedoresController@index')->name('proveedores.index');
	Route::post('/proveedores', 'ProveedoresController@store')->name('proveedores.store');
	Route::get('/proveedores/{id}/edit', 'ProveedoresController@edit')->name('proveedores.edit');
	Route::put('/proveedores/{id}', 'ProveedoresController@update')->name('proveedores.update');
	Route::get('/proveedores/{id}/destroy', 'ProveedoresController@destroy')->name('proveedores.destroy');

});


Auth::routes();
