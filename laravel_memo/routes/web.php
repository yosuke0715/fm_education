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
    return view('top');
});

Auth::routes();
// 
Route::get('/home', 'App\Models\Memo@showComment');
Route::post('/home', 'App\Models\Memo@showComment');

Route::post('/register', 'App\Http\Controllers\MemoController@addData');

Route::get('/delete/{id}', 'App\Http\Controllers\MemoController@delete');

Route::get('/edit/{id}', 'App\Http\Controllers\MemoController@edit');
Route::post('/edit/{id}', 'App\Http\Controllers\MemoController@edit');

Route::get('/update/{id}', 'App\Http\Controllers\MemoController@update');
Route::post('/update/{id}', 'App\Http\Controllers\MemoController@update');

Route::get('/search', 'App\Http\Controllers\MemoController@search');
Route::post('/search', 'App\Http\Controllers\MemoController@search');

Route::get('/all_delete', 'App\Http\Controllers\MemoController@allDelete');
Route::post('/all_delete', 'App\Http\Controllers\MemoController@allDelete');

Route::get('/image', 'App\Http\Controllers\PhotoController@showImage');
Route::post('/image', 'App\Http\Controllers\PhotoController@showImage');

Route::get('/sort', 'App\Http\Controllers\MemoController@sortComment');
Route::post('/sort', 'App\Http\Controllers\MemoController@sortComment');

Route::get('/history', 'App\Http\Controllers\HistoryController@history');
Route::post('/history', 'App\Http\Controllers\HistoryController@history');

Route::get('/history/add/{id}', 'App\Http\Controllers\HistoryController@historyAdd');
Route::post('/history/add/{id}', 'App\Http\Controllers\HistoryController@historyAdd');

Route::get('/history/sort', 'App\Http\Controllers\HistoryController@historySort');
Route::post('/history/sort', 'App\Http\Controllers\HistoryController@historySort');

Route::get('/history/search', 'App\Http\Controllers\HistoryController@historySearch');
Route::post('/history/search', 'App\Http\Controllers\HistoryController@historySearch');