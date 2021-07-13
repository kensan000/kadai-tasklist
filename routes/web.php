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

Route::get('/', 'TaskController@index');

Route::resource('tasks', 'TaskController');

// CRUD
// メッセージの個別詳細ページ表示
Route::get('tasks/{id}', 'TaskController@show');
// メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）
Route::post('tasks', 'TaskController@store');
// メッセージの更新処理（編集画面を表示するためのものではありません）
Route::put('tasks/{id}', 'TaskController@update');
// メッセージを削除
Route::delete('tasks/{id}', 'TaskController@destroy');

// index: showの補助ページ
Route::get('tasks', 'TaskController@index');
// create: 新規作成用のフォームページ
Route::get('tasks/create', 'TaskController@create')->name('tasks.create');
// edit: 更新用のフォームページ
Route::get('tasks/{id}/edit', 'TaskController@edit')->name('tasks.edit');
