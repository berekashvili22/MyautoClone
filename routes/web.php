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

// Auth::routes(['verify' => true]);
Auth::routes();

// ------------------------CLIENT
// posts
Route::get('/', 'PostController@index')->name('index');

Route::get('/profile/{user}/my_posts', 'PostController@profile')->name('post.index');

Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('verified');

Route::post('/post', 'PostController@store')->name('post.store');

Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');

Route::get('/post/{post}/delete', "PostController@destroy")->name('post.delete');

Route::patch('/post/{post}', 'PostController@update')->name('post.update');
// filter
Route::post('/post/filter', "PostController@filter")->name('post.filter');

// ---------------------------------ADMIN
// users
Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware(['auth', 'isadmin']);

Route::get('/admin/users', 'AdminController@users')->name('admin.users')->middleware(['auth', 'isadmin']);

Route::get('/admin/users/create', 'AdminController@create')->name('admin.create')->middleware(['auth', 'isadmin']);

Route::post('/admin/user', 'AdminController@store')->name('admin.store')->middleware(['auth', 'isadmin']);

Route::get('/admin/users/{user}/edit', 'AdminController@edit')->name('admin.edit')->middleware(['auth', 'isadmin']);

Route::get('/admin/users/{user}/delete', 'AdminController@delete')->name('admin.delete')->middleware(['auth', 'isadmin']);

Route::post('/admin/users/{user}', 'AdminController@update')->name('admin.update')->middleware(['auth', 'isadmin']);
// posts
Route::get('/admin/posts', 'AdminController@posts')->name('admin.posts')->middleware(['auth', 'isadmin']);

//categories

Route::get('/admin/categories', 'AdminController@categories')->name('admin.categories')->middleware(['auth', 'isadmin']);

Route::get('/admin/categories/create', 'AdminController@create_category')->name('admin.create_category')->middleware(['auth', 'isadmin']);

Route::post('/admin/category', 'AdminController@store_category')->name('admin.store_category')->middleware(['auth', 'isadmin']);

Route::get('/admin/categories/{category}/edit', 'AdminController@edit_category')->name('admin.edit_category')->middleware(['auth', 'isadmin']);

Route::get('/admin/categories/{category}/delete', 'AdminController@delete_category')->name('admin.delete_category')->middleware(['auth', 'isadmin']);

Route::post('/admin/categories/{category}', 'AdminController@update_category')->name('admin.update_category')->middleware(['auth', 'isadmin']);

// categories

Route::get('/admin/manufacturers', 'AdminController@manufacturers')->name('admin.manufacturers')->middleware(['auth', 'isadmin']);

Route::get('/admin/manufacturers/create', 'AdminController@create_manufacturer')->name('admin.create_manufacturer')->middleware(['auth', 'isadmin']);

Route::post('/admin/manufacturer', 'AdminController@store_manufacturer')->name('admin.store_manufacturer')->middleware(['auth', 'isadmin']);


Route::get('/admin/manufacturers/{manufacturer}/edit', 'AdminController@edit_manufacturer')->name('admin.edit_manufacturer')->middleware(['auth', 'isadmin']);

Route::get('/admin/manufacturers/{manufacturer}/delete', 'AdminController@delete_manufacturer')->name('admin.delete_manufacturer')->middleware(['auth', 'isadmin']);

Route::post('/admin/manufacturers/{manufacturer}', 'AdminController@update_manufacturer')->name('admin.update_manufacturer')->middleware(['auth', 'isadmin']);

// models

Route::get('/admin/brands', 'AdminController@brands')->name('admin.brands')->middleware(['auth', 'isadmin']);

Route::get('/admin/brands/create', 'AdminController@create_brand')->name('admin.create_brand')->middleware(['auth', 'isadmin']);

Route::post('/admin/brand', 'AdminController@store_brand')->name('admin.store_brand')->middleware(['auth', 'isadmin']);

Route::get('/admin/brands/{brand}/edit', 'AdminController@edit_brand')->name('admin.edit_brand')->middleware(['auth', 'isadmin']);

Route::get('/admin/brands/{brand}/delete', 'AdminController@delete_brand')->name('admin.delete_brand')->middleware(['auth', 'isadmin']);

Route::post('/admin/brands/{brand}', 'AdminController@update_brand')->name('admin.update_brand')->middleware(['auth', 'isadmin']);
