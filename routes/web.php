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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/github', 'GithubController@redirect');
Route::get('login/github/callback', 'GithubController@callback');

Route::get('login/facebook', 'FacebookController@redirect');
Route::get('login/facebook/callback', 'FacebookController@callback');
