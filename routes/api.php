<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1','namespace'=>'Api'],function (){
//Main controller
Route::get('governorates','MainController@governorate');
    Route::get('cities','MainController@cities');
    Route::get('categories','MainController@categories');
    Route::get('article_fav','MainController@article_fav');
    Route::get('settings','MainController@settings');
    Route::get('notification_settings','MainController@notification_settings');

  // Auth controller
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');

//route groupe with auth
    Route::group(['middleware'=>'auth:api'],function (){
    Route::get('articles','MainController@articles');
    Route::get('donationRequests','MainController@donationRequests');
    Route::get('add_donationRequests','MainController@add_donationRequests');
    Route::post('update_profile','MainController@update_profile');
    Route::post('make_report','MainController@make_report');
    Route::post('contact_us','MainController@contact_us');
    Route::post('favourites','MainController@favourites');



    });




});
