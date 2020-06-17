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

Route::post('change_locale','PublisherController@change_locale')->name('change_locale');

Route::get('news', 'NewsController@index');
Route::get('news/{id}','NewsController@show')->name('news');
Route::post('pub', 'NewsController@store')->name('pubr');
Route::get('news_edit/{id}', 'NewsController@news_edit')->name('news_edit');
Route::post('updatenews/{id}', 'NewsController@update')->name('updatenews');
Route::get('deletenews/{id}','NewsController@destroy');

Route::post('readcomment', 'ReadCommentController@store')->name('readcomment');
Route::get('editcomment/{id}','ReadCommentController@comment_edit')->name('editcomment');
Route::post('updatecomment/{id}','ReadCommentController@update')->name('updatecomment');
Route::get('deletecomment/{id}','ReadCommentController@destroy')->name('deletecomment');

Route::get('pub','PublisherController@index')->name('publisher');
Route::get('profile/{name}','PublisherController@show')->name('publishershow');
Route::get('links','LinkController@index')->name('links');
Route::get('links/{specid}','LinkController@show');
Route::post('linkstore', 'LinkController@store')->name('linkstore');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
