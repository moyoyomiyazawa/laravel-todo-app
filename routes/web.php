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


Route::group(['middleware' => 'auth' ], function () {
    // ホーム画面
    Route::get('/', 'HomeController@index')->name('home');

    // タスク一覧ページ
    // view,folder は左側が認可処理の種類、右側がポリシーに渡すルートパラメーター（URL の変数部分）を示します。
    // Route::group(['middleware' => 'can:view.folder'], function () {
    //     Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');
    // });
    Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');

    // フォルダ作成ページ
    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');

    // タスク作成ページ
    Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/folders/{folder}/tasks/create', 'TaskController@create');

    // タスク編集ページ
    Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');
});


Auth::routes();
