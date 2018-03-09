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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');
Route::resource('post', 'PostController');

Route::post('category/{category}/add-comment', 'CategoryController@addComment')
    ->name('add.category.comment');

Route::post('post/{post}/add-comment', 'PostController@addComment')
    ->name('add.post.comment');

Route::get('session/statistic', 'SessionController@statistic')
    ->name('session.statistic');