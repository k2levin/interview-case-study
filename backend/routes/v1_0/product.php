<?php

Route::middleware('auth.api.user')->group(function () {
    Route::get('brands', 'ProductController@getBrand')->name('product.brand.get');
    Route::get('categories', 'ProductController@getCategory')->name('product.category.get');
    Route::get('products', 'ProductController@getProduct')->name('product.product.get');

    Route::prefix('user')->group(function () {
        Route::get('carts', 'CartController@getMyCart')->name('cart.user.get');
        Route::post('cart/item/add', 'CartController@addItem')->name('cart.item.add');
        Route::post('cart/item/{id}/remove', 'CartController@removeItem')->name('cart.item.remove');
        Route::post('cart/clear', 'CartController@clearAll')->name('cart.all.clear');

        Route::get('orders', 'OrderController@getMyOrders')->name('order.user.get');
        Route::post('order/checkout', 'OrderController@createOrder')->name('order.create.post');
        Route::post('order/{id}/pay', 'OrderController@pay')->name('order.pay.post');
    });
});
