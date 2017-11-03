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
});


Auth::routes();


Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);