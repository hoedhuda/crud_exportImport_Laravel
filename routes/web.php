<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Route::resource('comments','CommentsController');
//Route::resource('tasks','TasksController');

//Route::get('/', 'TasksController@index');
//Route::post('/', 'TasksController@create');

 Route::get('/', function(){ 
 	return redirect('tasks'); 

 });

Route::resource('comments','CommentsController');

Route::resource('tasks', 'TasksController'); 
Route::get('create', 'TasksController@create'); 
Route::post('show', 'TasksController@show'); 
//Route::post('/tasks/store', 'CommentsController@store');{


Route::get('downloadExcel/{type}/{id}', 'TasksController@downloadExcel');
Route::post('importExcel', 'TasksController@importExcel');

//Route::get('/', 'ImageController@index');

//Route::get('/', 'MaatwebsiteDemoController@importExport');

/*Route::group(['middleware' => 'web'], function(){
	Route::get('/crud', 'CrudController@index');
	Route::post('/crud/store', 'CrudController@store');
	Route::post('/crud/update', 'CrudController@update');
	Route::post('/crud/destroy', 'CrudController@destroy');

});
Route::get('/crud', 'CrudController@index');
	Route::post('/crud/store', 'CrudController@store');
	Route::post('/crud/update', 'CrudController@update');
	Route::post('/crud/destroy', 'CrudController@destroy');
*/
