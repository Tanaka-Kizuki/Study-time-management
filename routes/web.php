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

Route::get('/', function () {
    return view('welcome');
});

//ホーム
Route::get('/home','StudyController@index');

//学習登録画面
Route::get('start/record','StudyController@startRecord');
Route::get('/start','StudyController@start');
Route::get('/finish/record','StudyController@finishRecord');
Route::get('/finish','StudyController@finish');


//書籍登録画面
Route::get('/book','StudyController@book');
Route::get('/book/record','StudyController@bookadd');

//使い方ページ
Route::get('/how','StudyController@howDo');

//いいね機能
Route::get('/posts/{post?}/check', 'LikeController@check')->name('like.check');
Route::get('/posts/{post?}/firstcheck', 'LikeController@firstcheck')->name('like.firstcheck');
Route::resource('posts.likes', 'LikeController', [
     'only' => ['store'],
]);
//いいねしているユーザーの表示
Route::get('/posts/{post?}/like','LikeController@like');

Route::get('/user/{id?}','UserController@index');
Route::post('/user/edit/{id?}','UserController@edit');

Auth::routes();

# ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

// Route::get('/home', 'HomeController@index')->name('home');


//リプライ画面表示
route::get('/reply/{id}','StudyController@reply');
route::post('/reply/add','StudyController@replyAdd');

//チャート
Route::get('/chart','UserController@chart');