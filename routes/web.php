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
	
/*ユーザーページ*/
Route::get('/detail', 'DetailController@index')->name('detail','connection');
Route::get('/detail/{user_id}', 'DetailController@show');
Route::get('/detail-edit', 'DetailController@edit');
Route::post('/detail-edit', 'DetailController@update');
	
/*フォロー一覧*/	
Route::get('/follow', 'DetailController@follow');	
// フォロー/フォロー解除を追加
Route::post('users/{user}/follow', 'ConnectionController@follow')->name('follow');
Route::delete('users/{user}/unfollow', 'ConnectionController@unfollow')->name('unfollow');
	
/*通知機能*/	
Route::get('/notice','DetailController@notice');
Route::post('/notice-edit', 'DetailController@update');	
	
/*検索機能*/	
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

/*評価機能*/
Route::get('/ev/{user_id}','DetailController@ev');
Route::post('/evaluation','DetailController@evaluation_store');

//Route::get('/evaluation','SearchController@evaluation')->name('evaluation');

Route::post('users/{user}/evaluation', 'ConnectionController@evaluation')->name('evaluation');
Route::delete('users/{user}/unevaluation', 'ConnectionController@unevaluation')->name('unevaluation');

/*ユーザー情報登録*/ 
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

/*ログイン、ログアウト*/
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/test', 'DetailController@test');	