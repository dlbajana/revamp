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
| PROVIDERS
|--------------------------------------------------------------------------
*/
Route::post('providers/{provider}/action', 'ProviderController@action')->name('providers.action');
Route::get('providers/{provider}/print', 'ProviderController@printDocument')->name('providers.print');
Route::resource('providers', 'ProviderController', ['except' => ['destroy']]);

/*
|--------------------------------------------------------------------------
| PHYSICIANS
|--------------------------------------------------------------------------
*/
Route::post('physicians/{physician}/action', 'PhysicianController@action')->name('physicians.action');
Route::get('physicians/{physician}/print', 'PhysicianController@printDocument')->name('physicians.print');
Route::resource('physicians', 'PhysicianController', ['except' => ['destroy']]);

/*
|--------------------------------------------------------------------------
| ICD
|--------------------------------------------------------------------------
*/
Route::resource('icd', 'ICDController', ['only' => ['index']]);
