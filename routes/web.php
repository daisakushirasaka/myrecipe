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

Route::get('/', function () {return view('welcome');});

// create画面のview表示アクション
Route::get('admin/create', 'RecipeController@add')->middleware('auth');

// create画面の新規作成アクション
Route::post('admin/create', 'RecipeController@create');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
