<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'as'	=>	'/',
	'uses'	=>	'StorageController@index'
]);

Route::get('formulario', [
	'as'	=> 	'formulario',
	'uses'	=>	'StorageController@create'
]);

Route::get('archivos/{id}/destroy', [
	'as'	=>	'archivos.destroy',
	'uses'	=>	'StorageController@destroy'
]);

Route::post('public/storage/create', 'StorageController@save');

Route::get('archivos/{id}/descargar', [
	'as'	=>	'archivos.descargar',
	'uses'	=>	'StorageController@descargar'
]);
