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

	Route::group(['prefix' => 'funcionarios'], function() {
	    Route::get('', 'FuncionarioController@index')->name('funcionarios');
	    Route::get('create', 'FuncionarioController@create')->name('funcionarioCreate');
	    Route::post('create', 'FuncionarioController@store');
	    Route::get('{funcionario}/{nome?}', 'FuncionarioController@show')->name('funcionario');
	    Route::get('edit/{funcionario}/{nome?}', 'FuncionarioController@edit')->name('funcionarioEdit');
	    Route::post('edit/{funcionario}/{nome?}', 'FuncionarioController@update');
	    Route::post('destroy/{funcionario}/{nome?}', 'FuncionarioController@destroy')->name('funcionarioDestroy');
	});

	Route::get('storage', 'HomeController@storage');
});
