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


Route::group(['middleware' => 'auth', ], function () {
    Route::get('/', 'PostController@index')->name('home');
    Route::get('about', 'PostController@about')->name('about');
    Route::get('news', 'PostController@news')->name('news');
    Route::get('orders', 'PostController@orders')->name('orders');
    Route::get('category/{post_id}', 'PostController@category');
    Route::get('game/{post_id}', 'PostController@chooseGame');
    Route::get('getgames', 'PostController@getGames');
    Route::post('order', 'PostController@order');
    Route::get('setting', 'PostController@setGames')->name('gameSetting');
    Route::post('editGame', 'PostController@editGame')->name('editGame');
    Route::post('updateGame', 'PostController@updateGame')->name('updateGame');
    Route::get('setting/destroy/{post_id}', 'PostController@destroy');
    Route::post('setting/create', 'PostController@create');


});
Auth::routes();


