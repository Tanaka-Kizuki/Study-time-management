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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
