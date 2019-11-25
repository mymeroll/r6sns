<?php
use App\Http\Middleware\HelloMiddleware;
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
Route::group(['middleware' => 'auth'], function () {

Route::get('/detail', 'DetailController@index')->name('detail','connection');
Route::get('/detail/{user_id}', 'DetailController@show');
Route::get('/detail-edit', 'DetailController@edit');
Route::post('/detail-edit', 'DetailController@update');
Route::get('/search-user', 'DetailController@searchuser');	
Route::get('/search','SearchController@search')->name('search');
Route::get('/searchrank','SearchController@searchrank')->name('searchrank');
Route::get('/search_action','SearchController@search')->name('search_action');
/*投稿機能*/
Route::get('/index', 'PostsController@index')->name('top');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store']]);
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show']]);
Route::resource('comments', 'CommentsController', ['only' => ['store']]);
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update']]);
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);
Route::get('/search-post','PostsController@searchpost');	
});

/*ログイン、ログアウト*/
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

/*ユーザー情報登録*/ 
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
 


/*Route::get('hello', 'HelloController@index')->middleware(HelloMiddleware::class);
Route::post('hello', 'HelloController@post');
Route::get('/detail{detail}', 'DetailController@detail')->name('detail');
Route::get('/post/{post}', 'PostController@detail')->name('posts.detail');
Route::get('/connection','ConnectionController@connection')->name('connection');
Route::get('/notice','ConnectionController@notice');
Route::post('/notice-edit', 'ConnectionController@update');
Route::get('/message','MessagesController@index');