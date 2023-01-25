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
// Get Request
Route::get('/test_page', 'TestController@index');
Route::get('/test_page/create', 'TestController@create');
Route::get('/test_page/update', 'TestController@update');
Route::get('/test_page/delete', 'TestController@delete');
Route::get('/test_page/restore_test', 'TestController@restoreTest');
Route::get('/test_page/update_or_create', 'TestController@updateOrCreate');
Route::get('/test_page/first_or_create', 'TestController@firstOrCreate');

// Post Request
Route::post('tests', 'TestController@store');

// Get Request Only one data
Route::get('tests/{test}', 'TestController@show');
// GET Edit
Route::get('tests/{test}/edit', 'TestController@edit');

// PUT or PATCH requests
Route::patch('tests/{test}', 'TestController@update');

//Delete request
Route::delete('tests/{test}', 'TestController@destroy');
