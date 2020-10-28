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
Route::post('admin/create', 'RecipeController@create')->name("create_recipe");

// index画面のview表示アクション
Route::get('admin/index', 'RecipeController@index')->middleware('auth')->name("recipe_list");

// edit画面のview表示アクション
Route::get('admin/edit', 'RecipeController@edit')->middleware('auth')->name("recipe_edit");

// edit画面のpostアクション
Route::post('admin/edit', 'RecipeController@update')->middleware('auth')->name("recipe_update");

// about画面のpostアクション
Route::get('about', 'RecipeController@about')->name("about");

// edit画面における削除用のpostアクション
Route::get('recipe/delete', 'RecipeController@delete')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
