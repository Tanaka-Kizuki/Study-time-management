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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','StudyController@index');
Route::get('/start','StudyController@start');
Route::get('/finish','StudyController@finish');

Route::get('/book','StudyController@record');
Route::get('/book/record','StudyController@book');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
