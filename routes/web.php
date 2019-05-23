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
use Laravel\Socialite\Facades\Socialite;
// use Socialite;

Route::get('/', 'Web\AppController@getApp');

Route::get('/login', 'Web\AppController@getLogin')->name('login')->middleware('guest');

Route::get('/login/{provider}', 'Web\AuthenticationController@getSocialRedirect')->middleware('guest');

Route::get('/login/{provider}/callback', 'Web\AuthenticationController@getSocialCallback')->middleware('guest');

Route::get('/p', function ($provider) {
    $socialUser = Socialite::with($provider)->user();
    return $socialUser;

});
// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');
