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
//     return view('home');
// });
Route::get('/','App\Http\Controllers\BlogController@index');
Route::get('/blogs','App\Http\Controllers\BlogController@blogIndex');
Route::get('/blog/{slug}','App\Http\Controllers\BlogController@blogSingle');
Route::get('/category/{categoryName}/{id}','App\Http\Controllers\BlogController@categoryIndex');
Route::get('/tag/{tagName}/{id}','App\Http\Controllers\BlogController@tagIndex');
Route::get('/search','App\Http\Controllers\BlogController@search');


