<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('user/book');
});

Auth::routes();


Route::group(['prefix' => 'user'], function()
{
    Route::resource('book', 'User\BookController', [
         'only' => ['index', 'show']
     ]);
    Route::get('book/category/{id}', [
        'as' => 'book/category/{id}', 'uses' => 'User\BookController@category'
    ]);
    Route::post('book/search', [
        'as' => 'book/search', 'uses' => 'User\BookController@search'
    ]);
});
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function()
{
    Route::resource('book', 'User\BookController', [
         'only' => ['update', 'create', 'store', 'destroy', 'edit']
     ]);
    Route::resource('profile', 'User\MemberController', [
         'only' => ['show']
     ]);

    Route::resource('member', 'User\MemberController', [
         'only' => ['update']
     ]);
    Route::get('book/update/{id}', [
        'as' => 'book/update/{id}', 'uses' => 'User\BookController@update'
    ]);

});
Route::get('/callbackTwitter/{provider}', 'SocialAuthController@callbackTwitter');
Route::get('/redirectTwitter/{provider}', 'SocialAuthController@redirectTwitter');
Route::get('/redirectFacebook', 'SocialAuthController@redirectFacebook');
Route::get('/callbackFacebook', 'SocialAuthController@callbackFacebook');

Route::get('admin/book/update/{id}', ['as' => 'update_status',  'uses'=> 'Admin\BookController@updateStatus', 'permission'=> 'update' ]);


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function()
{
    Route::resource('book', 'Admin\BookController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('member', 'Admin\MemberController');
    Route::resource('user', 'Admin\UserController');
    
});