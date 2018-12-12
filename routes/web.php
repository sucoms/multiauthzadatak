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
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/admin', 'PagesController@admin');
    Route::post('/adminForma', 'PagesController@adminForma')->name('adminForma');
    Route::get('/users', 'PagesController@users');
    Route::get('/settings', 'PagesController@settings');
    Route::post('/settings', 'PagesController@settings');
    Route::post('/live_search/generateUserTable', 'PagesController@generateUserTable');
    Route::get('/live_search/generateUserTable', 'PagesController@generateUserTable')->name('live_search.generateUserTable');
    Route::get('/live_search/action', 'PagesController@action')->name('live_search.action');
    Route::post('/live_search/action', 'PagesController@action');
    Route::get('/live_search/postUserRole', 'PagesController@postUserRole')->name('live_search.postUserRole');
    Route::post('/live_search/postUserRole', 'PagesController@postUserRole');
    Route::get('/live_search/destroy', 'PagesController@destroy')->name('live_search.destroy');
});

Route::get('/form', 'PagesController@form');

Route::post('/form', ['as' => 'form', 'uses' => 'PagesController@save_data']);

Route::resource('Admin', 'PagesController');

Auth::routes();
