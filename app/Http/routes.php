<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/register',  ['uses'=>'Auth\AuthController@getRegister'] );
Route::get('/logout',  ['uses'=>'Auth\AuthController@getLogout'] );
Route::post('/login',  ['uses'=>'Auth\AuthController@postLogin'] );

Route::post('/register', ['uses'=>'Auth\AuthController@postRegister']);


Route::get('/subscribe', ['uses'=>'SubscriptionController@index']);

Route::get('/payment/{id}', ['uses'=>'SubscriptionController@payment']);

Route::get('/receipt/{hash}', ['uses'=>'SubscriptionController@receipt']);

Route::get('/payment_execute', ['uses'=>'SubscriptionController@execute']);

Route::get('/my/transaction_list', ['uses'=>'MyController@getTransactionList']);

Route::get('/my/schedules', ['uses'=>'MyController@getSchedules']);
Route::post('/my/schedules', ['uses'=>'MyController@postSchedules']);

Route::get('/my/schedule_list', ['uses'=>'MyController@getScheduleList']);





Route::post('/subscribe/{id}', ['uses'=>'SubscriptionController@subscribe']);
Route::post('/subscribe/{id}/paypal', ['uses'=>'SubscriptionController@subscribePaypal']);



