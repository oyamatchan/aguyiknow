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
    //view all post recipes
    Route::get('/foodPage','HomeController@foodPage')->name('foodPage');
    //view your posts
    Route::get('/foodPage/myposts','HomeController@viewMyPosts')->name('myPosts');
    //edit your post
    Route::get('/recipe/{rid}/edit','HomeController@editRecipe');
    Route::post('/recipe/{rid}/update','HomeController@updateRecipe'); 
    //delete posted recipe
    Route::get('/recipe/{rid}/delete','HomeController@deleteRecipe');

    //view recipe
    Route::get('/foodPage/{id}/view','HomeController@viewRecipe');
    //update profile details
    Route::get('/updateProfile/{id}/edit','ProfileController@updateProfile')->name('updateProfile');
    //save profile update
    Route::post('/updateProfile/{rid}/save','ProfileController@saveProfile');
    //share/save your recipe
    Route::post('/shareRecipe/save','HomeController@saveRecipe');
    //search for a recipe
    Route::post('/searchRecipe','HomeController@searchRecipe');


    
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/login','auth.login')->name('login');
Route::view('/register','auth.register')->name('register');
Route::post('/login','LoginController@authenticate');
Route::get('/logout','LoginController@logout')->name('logout');

