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
    return view('home');
});
Route::get('home', function () {
    return view('home');
});
Route::get('login', function () {
	if(Auth::check())
	{
	   return Redirect::to('home');
	}else{
	   return view('login');
	}    
});
Route::get('register', function () {
    if(Auth::check())
	{
	   return Redirect::to('home');
	}else{
	   return view('register');
	}
});
Route::get('404', function () {
    return view('404');
});

Route::post('register-user',['as'=>'register-user', 'uses'=>'HomeProcessController@registerUser']);
Route::post('login-user',['as'=>'login-user', 'uses'=>'HomeProcessController@logInUser']);
Route::post('update-user-profile',['as'=>'update-user-profile', 'uses'=>'HomeProcessController@updateProfile']);
Route::get('logout', 'HomeProcessController@logout');
Route::get('my-profile', 'HomeProcessController@myProfile');
Route::get('users-list', 'HomeProcessController@usersList');
Route::get('verify-email/{link}', 'HomeProcessController@varifyEmailLink');

Route::get('basic_email', 'MailController@html_email');