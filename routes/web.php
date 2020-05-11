<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/post/{slug}', 'PostController@index')->name('post');
Route::post('/post/add', 'PostController@add')->name('post.add');
Route::post('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post/replaceImage/{postId}', 'PostController@replaceImage')->name('post.replaceImage');
Route::get('/post/delete/{id}', 'PostController@delete')->name('post.delete');

Route::post('/comment/add/{postId}', 'CommentController@add')->name('comment.add');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

Route::get('/login', 'UserController@index')->name('user');
Route::post('/user/login', 'UserController@login')->name('user.login');
Route::get('/user/logout', 'UserController@logout')->name('user.logout');

Route::get('/dashboard', 'DashboardController@posts')->name('dashboard');
Route::get('/dashboard/posts', 'DashboardController@posts')->name('dashboard.posts');
Route::get('/dashboard/comments', 'DashboardController@comments')->name('dashboard.comments');
