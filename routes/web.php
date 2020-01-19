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
Route::get('/students/search', 'StudentController@search');

Route::get('/student-classes', 'StudentClassController@index');
Route::get('/student-classes/create', 'StudentClassController@create');
Route::post('/student-classes/store', 'StudentClassController@store');
Route::get('/student-classes/create-multiple', 'StudentClassController@createMultiple');
Route::post('/student-classes/store-multiple', 'StudentClassController@storeMultiple');
Route::get('/student-classes/edit', 'StudentClassController@edit');
Route::put('/student-classes/{id}/update', 'StudentClassController@update');
Route::delete('/student-classes/delete', 'StudentClassController@delete');
Route::get('/student-classes/search', 'StudentClassController@search');

Route::get('/sections', 'SectionController@index');
Route::get('/sections/create', 'SectionController@create');
Route::post('/sections/store', 'SectionController@store');
Route::get('/sections/create-multiple', 'SectionController@createMultiple');
Route::post('/sections/store-multiple', 'SectionController@storeMultiple');
Route::get('/sections/edit', 'SectionController@edit');
Route::put('/sections/{id}/update', 'SectionController@update');
Route::delete('/sections/delete', 'SectionController@delete');
Route::get('/sections/search', 'SectionController@search');