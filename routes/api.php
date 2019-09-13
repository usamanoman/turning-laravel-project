<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/test', function() {
    dd(\Auth::user());
});

Route::group(['prefix' => 'attributes'], function () {
    Route::get('/', 'AttributeController@getAllAttributes');
    Route::get('/{attribute}', 'AttributeController@getSingleAttribute');
    Route::get('/values/{attribute_id}', 'AttributeController@getAttributeValues');
    Route::get('/inProduct/{product}', 'AttributeController@getProductAttributes');
});

Route::get('/customers', 'CustomerController@getCustomerProfile');
Route::post('/customers', 'CustomerController@create');
Route::post('/customers/login', 'CustomerController@login');
Route::put('/customer', 'CustomerController@apply');
Route::put('/customer/address', 'CustomerController@updateCustomerAddress');
Route::put('/customer/creditCard', 'CustomerController@updateCreditCard');



Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@getAllProducts');
    Route::get('/search', 'ProductController@searchProduct');
    Route::get('/{product}', 'ProductController@getProduct');
    Route::get('/inCategory/{category}', 'ProductController@getProductsByCategory');
    Route::get('/inDepartment/{department}', 'ProductController@getProductsInDepartment');
    Route::get('/{product}/reviews', 'ProductController@getProductReview');
    Route::post('/{product}/reviews', 'ProductController@saveProductReview');
});


Route::group(['prefix' => 'departments'], function () {
    Route::get('/', 'ProductController@getAllDepartments');
    Route::get('/{department}', 'ProductController@getDepartment');

});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'ProductController@getAllCategories');
    Route::get('/{category}', 'ProductController@getCategory');
    Route::get('/inDepartment/{department}', 'ProductController@getDepartmentCategories');
    Route::get('/inProduct/{product}', 'ProductController@getProductCategories');

});


Route::get('/shipping/regions', 'ShippingController@getShippingRegions');
Route::get('/shipping/regions/{shipping_region}', 'ShippingController@getShippingType');



Route::group(['prefix' => 'shoppingcart'], function () {
    Route::get('/generateUniqueId', 'ShoppingCartController@generateUniqueCart');
    Route::post('/add', 'ShoppingCartController@addItemToCart');
    Route::get('/{cart_id}', 'ShoppingCartController@getCart');
    Route::put('/update/{item_id}', 'ShoppingCartController@updateCartItem');
    Route::delete('/empty/{cart_id}', 'ShoppingCartController@emptyCart');
    Route::delete('/removeProduct/{item_id}', 'ShoppingCartController@removeItemFromCart');
});

Route::group(['prefix' => 'orders'], function () {
    Route::post('/', 'ShoppingCartController@createOrder');
    Route::get('/inCustomer', 'ShoppingCartController@getCustomerOrders');
    Route::get('/shortDetail/{order}', 'ShoppingCartController@getOrderShortDetail');
    Route::get('/{order}', 'ShoppingCartController@getOrderSummary');
});

Route::post('/stripe/charge', 'ShoppingCartController@processStripePayment');


Route::get('/tax', 'TaxController@getAllTax');
Route::get('/tax/{tax_id}', 'TaxController@getTaxById');