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

Route::get('/', 'PagesController@index');

// mogu pristupiti samo logirani korisnici
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', 'PagesController@admin');

    Route::get('/users', 'PagesController@users');
    Route::get('/settings', 'PagesController@settings');
    Route::post('settings', 'PagesController@settings');
});
// Route::get('/admin', 'PagesController@admin');

// Route::get('/users', 'PagesController@users');

Route::get('/form', 'PagesController@form');
Route::post('form', 'PagesController@form');


Route::post('form', ['as' => 'form', 'uses' => 'PagesController@save_data']);

// Route::get('/settings', 'PagesController@settings');
// Route::post('settings', 'PagesController@settings');

Route::resource('Admin', 'PagesController');

Auth::routes();
