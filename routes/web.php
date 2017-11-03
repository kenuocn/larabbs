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

//前台模块
Route::group(['namespace' => 'Home'], function (){

    Route::get('/', 'PagesController@root')->name('root');


    Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

    Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);

    Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

    Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

    Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

});


Auth::routes();

Route::resource('replies', 'RepliesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);