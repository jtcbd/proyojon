<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/test', function(){
	return view('auth.verification.code');
});

// Registration Verification
Route::group(['prefix' => 'verification', 'middleware' => 'guest'], function() {
    Route::get('/', 'Account\RegisterVerificationController@index')->name('verification.index');
    Route::post('/', 'Account\RegisterVerificationController@store')->name('verification.store');
});

Route::group(['middleware' => ['auth'], 'as' => 'account.'], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
