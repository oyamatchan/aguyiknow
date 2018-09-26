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
Route::middleware(['auth'])->group(function(){
    Route::get('/profile','HomeController@viewProfile');
    // Route::view('/viewProfile','profile.profile')->name('viewProfile');
    Route::get('/foodPage','HomeController@foodPage')->name('foodPage');
    Route::get('/updateProfile/{id}/edit','ProfileController@updateProfile')->name('updateProfile');
    Route::post('/updateProfile/{id}/save','ProfileController@saveProfile');
    Route::post('/shareQuote/save','HomeController@saveQuote');

    
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/login','auth.login')->name('login');
Route::view('/register','auth.register')->name('register');
Route::post('/login','LoginController@authenticate');
Route::get('/logout','LoginController@logout')->name('logout');

