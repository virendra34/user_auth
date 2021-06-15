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
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
Route::resource('users', 'UsersController');
Route::get('users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@destroy']);
Route::namespace('Auth')->group(function () {
    Route::get('login-form', 'LoginController@show_login_form')->name('login-form');
    Route::post('login', 'LoginController@process_login')->name('login');
    Route::get('register-form', 'LoginController@show_signup_form')->name('register-form');
    Route::post('register', 'LoginController@process_signup')->name('register');
    Route::any('logout', 'LoginController@logout')->name('logout');
    Route::get('/home', 'LoginController@home')->name('home');
});
