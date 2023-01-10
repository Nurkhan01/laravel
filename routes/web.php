<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test_page', 'TestController@index');
Route::get('/test_page/create', 'TestController@create');
Route::get('/test_page/update', 'TestController@update');
Route::get('/test_page/delete', 'TestController@delete');
Route::get('/test_page/restore_test', 'TestController@restoreTest');
