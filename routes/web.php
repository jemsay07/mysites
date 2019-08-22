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
Route::get('/users', 'UsersMetaController@index')->name('users.index');
Route::get('/users/create', 'UsersMetaController@create')->name('users.create');
Route::post( '/users', 'UsersMetaController@store' )->name('users.store');
Route::get('/users/{userMeta}/edit-profile', 'UsersMetaController@edit')->name('users.edit');
Route::put('/users/{id}', 'UsersMetaController@update')->name('users.update');


//Option
// Route::get( '/settings/general', 'JcOptionsController@create' )->name('settings.create');
Route::get( '/settings/general', 'JcOptionsController@edit' )->name('settings.edit');
Route::put( '/settings/general', 'JcOptionsController@update' )->name('settings.update');
// Route::post('/settings/general/store', 'JcOptionsController@store')->name('settings.store');