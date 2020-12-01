<?php

Route::post('login', 'GuestController@login')->name('guest.login');
Route::post('register', 'GuestController@register')->name('guest.register');
Route::post('logout', 'UserController@logout')->name('user.logout');

Route::post('user/verify', 'UserController@verify')->name('user.verify');
Route::get('user/profile', 'UserController@getProfile')->name('user.profile.get');
