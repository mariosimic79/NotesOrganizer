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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);






Route::get('/filemanager','FilemanagerController@Index');
Route::post('/filemanager','FilemanagerController@Index');
Route::get('/filemanager/{user}/{folder}/{file}', 'FilemanagerController@delete');
Route::post('/filemanagerUpload', 'FilemanagerController@upload');
Route::get('/filemanagerOpen/{user}/{folder}/{file}', 'FilemanagerController@open');
Route::get('/filemanagerDownload/{user}/{folder}/{file}', 'FilemanagerController@download');


Route::get('/editor', 'EditorController@index');
Route::get('/editor/{nazivDat}', 'EditorController@save');
Route::post('/editor', 'EditorController@Index');


Route::get('/gallery','GalleryController@Index');
Route::post('/gallery/{nazivSlike}','GalleryController@delete');
Route::post('/galleryUpload','GalleryController@upload');
