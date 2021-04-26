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

//Route::get("/",'Admin\FirstController@welcomed');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware("verified");

Route::get("/",function(){
    return "Home Page";
});

Route::get("/redirect/{service}",'SocialController@redirect');

Route::get('/callback/{service}','SocialController@callback');

Route::get('fillable','CrudController@getOffers');
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

Route::group(['prefix'=>'offers'],function(){
    //Route::get('store', 'CrudController@store');
            Route::get('create','CrudController@create');

    Route::get('all','CrudController@getAllOffer');
    Route::post('store','CrudController@store')->name("offers.store");
});
});
