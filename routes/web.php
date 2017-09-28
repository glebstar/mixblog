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

Route::get('/', 'BlogController@index')->name('blog');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function (){
    Route::match(['get', 'post'], '/', 'HomeController@index')->name('admin.index');
});

Auth::routes();

Route::group(['prefix' => 'cms', 'middleware' => 'cms'], function(){
    Route::get('/', ['as' => 'cms', 'uses' =>'\GlebStarSimpleCms\Controllers\AdminController@index']);
    Route::match(['get', 'post'], '/add', '\GlebStarSimpleCms\Controllers\AdminController@add');
    Route::match(['get', 'post'], '/edit/{id}', '\GlebStarSimpleCms\Controllers\AdminController@edit');
    Route::delete('/delete/{id}', '\GlebStarSimpleCms\Controllers\AdminController@delete');
});

// this route should be the last.
Route::get('{path}', '\GlebStarSimpleCms\Controllers\CmsController@index')->where('path', '([A-z\d-\/_.]+)?');