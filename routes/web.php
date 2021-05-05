<?php

use Illuminate\Support\Facades\Route;

Route::model('post', 'App\Models\Post');
Route::model('user', 'App\Models\User');
Route::model('category', 'App\Models\Category');

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::resource('post', 'App\Http\Controllers\PostController');

Route::get('/post/{id}', 'App\Http\Controllers\PostController@show');

Route::get('/tag/{name}', 'App\Http\Controllers\TagController@show');

Route::get('/author/{user}', 'App\Http\Controllers\AuthorController@show');

Route::get('/category/{category}', 'App\Http\Controllers\CategoryController@show');


