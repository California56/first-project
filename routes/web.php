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

Auth::routes([
    'reset' => false
]);
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::group([
    'middleware'=>'auth',
    'namespace'=> 'Admin'
], function() {
    Route::get('cabinet', 'OrderController@cabinet')->name('cabinet');
    Route::group([
        'middleware'=>'is_admin',
        'prefix' => 'admin'
    ], function() {
        Route::get('orders','OrderController@newOrders')->name('home');
        Route::get('orders/old', 'OrderController@oldOrders')->name('order-old');
        Route::get('orders/{order}', 'OrderController@show')->name('order-show');
        Route::post('orders/{order}/change', 'OrderController@changeOrder')->name('order-change');
        Route::post('orders/{order}/delete', 'OrderController@destroy')->name('order.delete');
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');  
    });
});

Route::group(['prefix'=>'cart'], function() {
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');
    Route::get('/empty', 'BasketController@basketEmpty')->name('basket-empty');

    Route::group(['middleware'=>'basket_not_empty'], function(){
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/order','BasketController@basketOrder')->name('basket-order');
        Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
        Route::post('/delete/{id}', 'BasketController@basketDelete')->name('basket-delete');
        Route::post('/order','BasketController@basketConfirm')->name('basket-confirm');
    });

});

Route::get('/', 'MainController@index')->name('index');
Route::get('reviews','MainController@reviews')->name('reviews');
Route::post('send-review', 'MainController@sendReview')->name('send-review');
Route::get('to-order','MainController@toOrder')->name('kak-zakazat');
Route::get('payment','MainController@payment')->name('oplata-i-dostavka');
Route::get('category/{id}', 'MainController@category')->name('category');
Route::get('category/{category}/product/{product}', 'MainController@product')->name('product');

Route::get('contacts','ContactsController@contacts')->name('contacts');
Route::post('send-message', 'ContactsController@sendMessage')->name('sendMessage');

Route::fallback(function() {
    return view('errors.404');
});
