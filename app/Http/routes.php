<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'as'   => 'home',
        'uses' => 'HomeController@index',
    ]);

    Route::get('/signin', [
        'as'         => 'auth.signin',
        'uses'       => 'AuthController@getSignin',
        'middleware' => ['guest'],
    ]);

    Route::post('/signin', [
        'uses'       => 'AuthController@postSignin',
        'middleware' => ['guest'],
    ]);

    Route::get('/signup', [
        'as'         => 'auth.signup',
        'uses'       => 'AuthController@getSignup',
        'middleware' => ['guest'],
    ]);

    Route::post('/signup', [
        'uses'       => 'AuthController@postSignup',
        'middleware' => ['guest'],
    ]);

    Route::get('/signout', [
        'as'         => 'auth.signout',
        'uses'       => 'AuthController@signout',
        'middleware' => ['auth'],
    ]);

    Route::get('/timeline', [
        'as'         => 'auth.timeline',
        'uses'       => 'HomeController@timeline',
        'middleware' => ['auth'],
    ]);

    Route::get('/community/posts', [
        'as'         => 'post.all',
        'uses'       => 'PostController@getAll',
        'middleware' => ['auth'],
    ]);
});
