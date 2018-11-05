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
Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get('/admin', 'PagesController@admin');
    Route::post('/adminForma', ['as' => 'adminForma', 'uses' => 'PagesController@adminForma']);
    Route::get('/users', 'PagesController@users');
    Route::get('/settings', 'PagesController@settings');
    Route::post('/settings', 'PagesController@settings');
    Route::get('/generateUserTable', 'PagesController@generateUserTable');
    Route::post('/generateUserTable', 'PagesController@generateUserTable');
    Route::get('/live_search/action', 'PagesController@action')->name('live_search.action');
    Route::post('/live_search/action', 'PagesController@action');
    Route::get('/live_search/destroy', 'PagesController@destroy')->name('live_search.destroy');
    Route::post('/live_search/generateUserTable', 'PagesController@generateUserTable');
    Route::get('/live_search/generateUserTable', 'PagesController@generateUserTable')->name('live_search.generateUserTable');
});
// Route::group(['middleware' => ['auth']], function() {
//     Route::get('/users', 'PagesController@users');
//     Route::get('/settings', 'PagesController@settings');
//     Route::post('settings', 'PagesController@settings');
    
//     // Route::get('/live_search/action', 'PagesController@action')->name('live_search.action');

// });
// Route::get('/admin', 'PagesController@admin');

// Route::get('/users', 'PagesController@users');



Route::get('/form', 'PagesController@form');

Route::post('/form', ['as' => 'form', 'uses' => 'PagesController@save_data']);

// Route::get('/settings', 'PagesController@settings');
// Route::post('settings', 'PagesController@settings');

Route::resource('Admin', 'PagesController');

Auth::routes();
