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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-dashboard-data', 'HomeController@getDashboardData');

Route::get('/students', 'StudentController@index');
Route::get('/students/create', 'StudentController@create');
Route::post('/students/store', 'StudentController@store');
Route::get('/students/edit', 'StudentController@edit');
Route::put('/students/{id}/update', 'StudentController@update');
Route::delete('/students/delete', 'StudentController@delete');