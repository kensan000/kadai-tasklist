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



Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');


Route::group(['middleware'=> ['auth']], function(){
    Route::get('/', 'TaskController@index');
    Route::resource('users', 'UsersController', ['only'=> ['index','store', 'show','edit','destroy']]);
    Route::resource('tasks','TaskController',['only'=> ['index','show','store','edit','update','destroy','create']]);
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
});
