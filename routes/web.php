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

// Route::get('/', function () {
//     return response()->json([
//         'success' => true,
//         'message' => 'Welcome to Turing E-commerce shop api, your goal is to implement the missing code or fix the bugs inside this project',
// ]);
// });
Auth::routes();

Route::get('/{any}', 'HomeController@index')->where('any', '.*');
// Route::get('/', 'HomeController@index')->name('home');
// View Category Page
// Route::get('/category', 'HomeController@category')->name('category');
// Route::get('/checkout', 'HomeController@checkout')->name('checkout');
// Route::get('/cart', 'HomeController@cart')->name('cart');
// View Single Product
// Route::get('/product/{id}', 'ProductController@index')->name('product.view');
// Route::get('/home', 'HomeController@index')->name('home');
