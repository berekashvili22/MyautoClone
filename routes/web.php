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

Auth::routes();

Route::get('/', 'PostController@index')->name('index');

Route::get('/profile/{user}/my_posts', 'PostController@profile')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post', 'PostController@store')->name('post.store');
Route::get('/post/{post}', 'PostController@show')->name('post.show');
Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
Route::get('/post/{post}/delete', "PostController@destroy")->name('post.delete');
Route::patch('/post/{post}', 'PostController@update')->name('post.update');

Route::post('/post/filter', "PostController@filter")->name('post.filter');