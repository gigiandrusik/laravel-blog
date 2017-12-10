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

Route::post('/add-category-comment', 'CommentController@addCommentToCategory')->name('add.category.comment');
Route::post('/add-post-comment', 'CommentController@addCommentToPost')->name('add.post.comment');

Route::group(['prefix' => 'session'], function () {
    Route::get('get', 'SessionController@getSession')->name('get.session');
    Route::get('statistic', 'SessionController@statistic')->name('session.statistic');
});


