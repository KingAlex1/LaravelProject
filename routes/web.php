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


Route::group(['middleware' => 'auth',], function () {
    Route::match(['get', 'post'] ,'/', 'PostController@index')->name('home');
    Route::get('about', 'PostController@about')->name('about');
    Route::get('news', 'PostController@news')->name('news');
    Route::get('orders', 'PostController@orders')->name('orders');
    Route::get('category/{post_id}', 'PostController@category');
    Route::get('game/{post_id}', 'PostController@chooseGame');
    Route::get('getgames', 'PostController@getGames');
    Route::post('order', 'PostController@order');
    Route::get('setting/goods', 'PostController@setGames')->name('gameSetting');
    Route::get('setting/categories', 'PostController@setCategory')->name('categorySetting');
    Route::post('setting/editGame', 'PostController@editGame')->name('editGame');
    Route::post('setting/updateGame', 'PostController@updateGame')->name('updateGame');
    Route::post('setting/editCategory', 'PostController@editCategory')->name('editCategory');
    Route::post('setting/updateCategory', 'PostController@updateCategory')->name('updateCategory');
    Route::get('setting/good/destroy/{post_id}', 'PostController@destroyGood');
    Route::get('setting/category/destroy/{post_id}', 'PostController@destroyCategory');
    Route::post('setting/good/create', 'PostController@createGood');
    Route::post('setting/category/create', 'PostController@createCategory');
//    Route::post(
//        '/',
//        array(
//            'as' => 'posts.search',
//            'uses' => 'PostController@postSearch'
//        )
//    );


});
Auth::routes();


