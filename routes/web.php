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
    return view('welcome');
});

Route::get('products', 'ProductsController@index')->name('allProducts');

Route::get('product/addToCart/{id}','ProductsController@addProductToCart')->name('AddCartProduct');

Route::get('cart','ProductsController@showCart')->name('cartproducts');

Route::get('product/deleteItemFromCart/{id}','ProductsController@deleteItemFromCart')->name('deleteItemFromCart');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/men', 'ProductsController@menProducts')->name('menProducts');
Route::get('/products/women', 'ProductsController@womenProducts')->name('womenProducts');
Route::get('search', 'ProductsController@search')->name('searchProducts');


