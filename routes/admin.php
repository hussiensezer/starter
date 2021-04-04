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



//Route::namespace('Admin')->group(function(){
//    Route::get('admins','adminController@showAdminName');
//});

//Route::group(['prefix' => 'Admin'],function(){
//    Route::get('admins','adminController@showAdminName');
//
//});

//Route::get("login",function(){
//    return "You Must Be Logined First Before VIST";
//})->name("login");
//
//Route::group(['namespace' => 'Admin'],function() {
//    Route::get("first", "FirstController@showStrings");
//    Route::get("second", "FirstController@showNumber");
//    Route::get("three", "FirstController@showName");
//
//});
//
//Route::resource('news','NewsController');

Route::group(['namespace'=>'Admin'],function(){
    Route::get('/index', "FirstController@showIndex");
    Route::get('/user', "FirstController@showUser");
    Route::get("/landing", "FirstController@showLanding");

});
