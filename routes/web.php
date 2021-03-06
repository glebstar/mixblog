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

Route::get('/blog/{slug}/{id}', 'BlogController@article')->name('blog.article');

Route::match(['get', 'post'], '/contact', 'ContactController@index')->name('contact');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function (){
    Route::match(['get', 'post'], '/', 'HomeController@index')->name('admin.index');
    Route::get('/menu', 'HomeController@menu')->name('admin.menu');
    Route::get('/menu/add', 'HomeController@menuAdd')->name('admin.menu.add');
    Route::get('/menu/del', 'HomeController@menuDel')->name('admin.menu.del');
    Route::post('/menu/save', 'HomeController@menuSave');

    Route::get('/blog', 'BlogController@index')->name('admin.blog');
    Route::match(['get', 'post'], '/blog/add', 'BlogController@add')->name('admin.blog.add');
    Route::match(['get', 'post'], '/blog/edit', 'BlogController@edit')->name('admin.blog.edit');
    Route::get('/blog/del', 'BlogController@del')->name('admin.blog.del');

    Route::get('/contact', 'ContactController@index')->name('admin.contact');
});

Auth::routes();

Route::group(['prefix' => 'cms', 'middleware' => 'cms'], function(){
    Route::get('/', ['as' => 'cms', 'uses' =>'\GlebStarSimpleCms\Controllers\AdminController@index']);
    Route::match(['get', 'post'], '/add', '\GlebStarSimpleCms\Controllers\AdminController@add');
    Route::match(['get', 'post'], '/edit/{id}', '\GlebStarSimpleCms\Controllers\AdminController@edit');
    Route::delete('/delete/{id}', '\GlebStarSimpleCms\Controllers\AdminController@delete');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

// this route should be the last.
Route::get('{path}', '\GlebStarSimpleCms\Controllers\CmsController@index')->where('path', '(?!laravel)([A-z\d-\/_.]+)?');
