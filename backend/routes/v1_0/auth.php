<?php

Route::post('login', 'GuestController@login')->name('guest.login');
Route::post('register', 'GuestController@register')->name('guest.register');
Route::post('user/verify', 'UserController@verify')->name('user.verify');

Route::middleware('auth.api.user')->group(function () {
    Route::post('logout', 'UserController@logout')->name('user.logout');
    Route::get('user/profile', 'UserController@getProfile')->name('user.profile.get');
});
