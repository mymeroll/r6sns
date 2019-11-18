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

Auth::routes();

/*サイト表示*/
Route::get('/detail', 'DetailController@index')->name('detail');
Route::get('/detail{detail}', 'DetailController@detail')->name('detail');
Route::get('/post/{post}', 'PostController@detail')->name('posts.detail');
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/follow', 'DetailController@follow')->name('follow');
Route::get('/search','SearchController@search')->name('search');
Route::get('/searchrank','SearchController@searchrank')->name('searchrank');
Route::get('/search_action','SearchController@search')->name('search_action');
Route::get('/connection','ConnectionController@connection')->name('connection');
Route::get('/notice','DetailController@notice')->name('notice');
Route::get('/message','MessageController@message')->name('message');

/*投稿機能*/
Route::get('/', 'PostsController@index')->name('top');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store']]);
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show']]);
Route::resource('comments', 'CommentsController', ['only' => ['store']]);
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update']]);
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

/*ログイン、ログアウト*/
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

/*ユーザー情報登録*/ 
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');