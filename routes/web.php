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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/portfolio', 'HomeController@index')->name('portfolio');

Route::post('/', 'HomeController@storeComment');
Route::post('/portfolio', 'HomeController@storeComment');
Route::post('/admin', 'HomeController@storeComment');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'MediaController@index')->name('upload');
Route::post('/upload', 'MediaController@uploadMedia');

Route::get('/admin', 'MediaController@adminPanel')->name('admin-panel');

Route::get('/admin/deleteuser{email?}','MediaController@deleteUser');
Route::get('/admin/deletemedia/{mediaid?}','MediaController@deleteMedia');
Route::get('/admin/deletecomment/{commentid?}','MediaController@deleteComment');
Route::get('/userProfile', 'MediaController@showUserProfile')->name('user profile');
Route::post('/userProfile', 'MediaController@updateUser')->name('user profile');


Route::get('/mymedia', 'MediaController@mymedia')->name('mymedia');
Route::post('/mymedia', 'MediaController@updatePost')->name('mymedia');
