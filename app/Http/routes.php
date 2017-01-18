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



Route::group(['middleware' => 'auth'], function () {
    Route::post('catalogue', 'FilmsController@addFilm');
    Route::get('catalogue', 'FilmsController@catalogue');
    Route::get('catalogue/actual', 'FilmsController@actual');
    Route::get('catalogue/notActual', 'FilmsController@notActual');
    Route::post('catalogue/delete_film',['uses' => 'FilmsController@deleteFilm']);
    Route::post('catalogue/change/{film_id}', ['uses' => 'FilmsController@actualityChange']);
    Route::get('catalogue/hdrezka/{name}', 'FilmsController@hdrezka');
    Route::get('logout', 'Auth\AuthController@logout');
});
Route::post('/','Auth\AuthController@postLogin');
Route::get('/','Auth\AuthController@getLogin');
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

