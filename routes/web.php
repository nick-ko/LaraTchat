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
    return view('login');
})->name('login');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::post('/register', 'UserController@createUser')->name('save.user');

Route::post('/connect', [
    'uses' => 'UserController@logUser',
    'as' => 'connect'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);

Route::get('/conversations',[
    'uses'=> 'conversationController@index',
    'as'=>'conversations'
]);

Route::get('/conversations/{user}', 'conversationController@show')
    ->middleware('can:talkTo,user')
    ->name('conversations.show');

Route::post('/conversations/{user}', 'conversationController@store')->middleware('can:talkTo,user');
