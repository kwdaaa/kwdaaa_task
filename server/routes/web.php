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

Route::resource('tasks', 'TaskController')->except([
    'create'
]);

// リソースを使用しない場合
// Route::get('/articles', 'ArticleController@index');
// Route::get('/articles/create', 'ArticleController@create');
// Route::post('/articles', 'ArticleController@store');
// Route::get('/articles/{id}', 'ArticleController@show');
// Route::get('/articles/{id}/edit', 'ArticleController@edit');
// Route::patch('/articles/{id}', 'ArticleController@update');
// Route::delete('/articles/{id}', 'ArticleController@destroy');