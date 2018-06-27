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

Route::get('/admin', function () {
    return view('admin');
});

Route::middleware('auth')->group(function(){

	Route::middleware('role')->group(function(){

		Route::get('/admin/blog', 'PostController@index');

		Route::get('/admin/posts', 'PostController@show');

		Route::get('/admin/posts/add', 'PostController@create');

		Route::post('/admin/posts/add', 'PostController@store');

		Route::get('/admin/posts/{id}', 'PostController@show');

		Route::get('/admin/posts/{id}/edit', 'PostController@edit');

		Route::patch('/admin/posts/{id}/edit', 'PostController@update');

		Route::delete('/admin/posts/{id}/delete', 'PostController@destroy');

		Route::get('/admin/posts/categories/{id}', 'CategoryController@showByCategory');

	});

		Route::get('/about/', 'HomeController@about');

		Route::get('/blog', 'PostController@index');

		Route::get('/posts/categories/{id}', 'CommentController@create');

		Route::post('/posts/categories/{id}', 'CommentController@store');
		
		// Route::post('/posts/categories/update/{id}', 'CommentController@editComment');

		Route::patch('/comment/{id}/edit', 'CommentController@updateComment');

		Route::delete('/comment/{id}/delete', 'CommentController@destroy');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');