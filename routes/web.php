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


// Route::get( '/login', 'LoginController@index' );
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

//User
// Route::prefix('users')->group(function () {
// 	Route::get('/users', 'UserMetaController@index');
// });
Route::get('/users', 'UserMetaController@index')->name('user.index');
Route::post('/users', 'UserMetaController@store')->name('user.store');
Route::get('/users/create', 'UserMetaController@create')->name('user.create');
Route::get('/users/{userMeta}/edit-profile', 'UserMetaController@edit')->name('user.edit');
Route::put('/users/{id}', 'UserMetaController@update')->name('user.update');
