<?php

Auth::routes();
Route::get('/', function () { return view('welcome'); });
Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');

/*
|--------------------------------------------------------------------------
| USERS MANAGEMENT
|--------------------------------------------------------------------------
*/
Route::resource('users', 'UserController', ['except' => ['destroy']]);

/*
|--------------------------------------------------------------------------
| PROVIDER MANAGEMENT
|--------------------------------------------------------------------------
*/
Route::post('providers/{provider}/action', 'ProviderController@action')->name('providers.action');
Route::resource('providers', 'ProviderController', ['except' => ['destroy']]);
