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

Route::get('users/add', 'UserController@add');
Route::post('users/add', 'UserController@add');
Route::get('users/all', 'UserController@all');
Route::post('chats/add', 'ChatController@add');
Route::post('chats/get', 'UserController@getChats');
Route::post('messages/add', 'MessageController@add');