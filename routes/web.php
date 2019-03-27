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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
	Route::group(['prefix' => 'empresas'], function() {
	    Route::get('', 'EmpresaController@index')->name('empresas');
	    Route::get('create', 'EmpresaController@create')->name('empresaCreate');
	    Route::post('create', 'EmpresaController@store');
	    Route::get('{empresa}', 'EmpresaController@show')->name('empresa');
	    Route::get('edit/{empresa}', 'EmpresaController@edit')->name('empresaEdit');
	    Route::post('edit/{empresa}', 'EmpresaController@update');
	    Route::post('destroy/{empresa}', 'EmpresaController@destroy')->name('empresaDestroy');
	});
});
