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

//Route::get('/', function () {
//    return view('index');
//});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'api/v1'], function () {
    Route::get('init', function () {
        return response()->json(Auth::user());
    });
    Route::resource('task', 'TaskController');
    Route::put('task-isActive/{task}', 'TaskController@isComplete');
});
