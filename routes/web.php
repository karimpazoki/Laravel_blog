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

Route::group(['prefix' => 'admin','middleware' => 'auth'] , function (){
    Route::get('/home', 'HomeController@index')->name('dashboard.home');

    Route::get('/post/trashed','PostController@trashed')->name('post.trashed');
    Route::get('/post/restore/{id}','PostController@restore')->name('post.restore');
    Route::get('/post/delete/{id}','PostController@kill')->name('post.delete');
    Route::resource('post','PostController');

    Route::resource('category','CategoryController');
    Route::resource('tags','TagsController');
});