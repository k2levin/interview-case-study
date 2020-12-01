<?php

Route::get('products', 'ProductController@index')->name('product.index.get');

Route::post('cart/add', 'CartController@add')->name('cart.add');
Route::post('cart/remove', 'CartController@remove')->name('cart.remove');
Route::post('cart/clear', 'CartController@clear')->name('cart.clear');

Route::get('orders', 'OrderController@index')->name('order.index.get');
Route::post('order/create', 'OrderController@create')->name('order.create.post');
Route::post('order/pay', 'OrderController@pay')->name('order.pay.post');
