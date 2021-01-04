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

Auth::routes();

// Category
Route::get('/category', 'CategoryController@index');
Route::post('/category/add', 'CategoryController@store');
Route::get('/category/{id}', 'CategoryController@show');
Route::put('/category/{id}', 'CategoryController@update');
Route::delete('/category/{id}', 'CategoryController@destory');

// PostController
Route::get('/post', 'PostController@index')->name('post.index');
Route::post('/post', 'PostController@store')->name('post.store');
Route::get('/post/{id}', 'PostController@show')->name('post.show');
Route::delete('/post/{id}', 'PostController@destroy')->name('post.destroy');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{anypath}', 'HomeController@index')->where('path', '\w*');




