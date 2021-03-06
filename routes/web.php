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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* Application Route */

Route::get('community', 'CommunityLinkController@index');
Route::post('community', 'CommunityLinkController@store');
Route::get('community/{channel}', 'CommunityLinkController@index');
Route::post('votes/{link}', 'VotesController@store');
