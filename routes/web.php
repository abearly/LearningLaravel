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

Route::get('/swords', 'SwordController@index');
Route::post('/swords', 'SwordController@create');
Route::get('/swords/{type}', 'SpecificSwordController@index');

Auth::routes();

Route::get('/admin/add-sword', 'SpecificSwordController@create');
Route::post('/admin/add-sword', 'SpecificSwordController@store');
Route::get('/admin/add-sword/{id}', 'SpecificSwordController@show');
Route::delete('/delete-sword/{id}', 'SpecificSwordController@destroy');
