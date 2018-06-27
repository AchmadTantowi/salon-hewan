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
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');
Route::get('/payment-confirmation', 'HomeController@paymentConfirmation');
Route::get('/logout', 'HomeController@logout');

// CART
Route::post('/addToCart', 'HomeController@addToCart');
Route::get('/cart', 'CartController@index');
Route::get('/cart-remove/{id}', 'CartController@cartRemove');
Route::post('/save-order', 'CartController@saveOrder');

// CONTACT
Route::get('/contact', 'HomeController@contact');
Route::post('/sendContact', 'HomeController@sendContact');

// TESTIMONI
Route::get('/testimoni', 'TestimoniFrontController@testimoni');
Route::post('/sendTestimoni', 'TestimoniFrontController@sendTestimoni');

// PAYMENT CONFIRMATION
Route::get('/payment-confirmation', 'PaymentConfirmController@paymentConfirmation');
Route::post('/sendPaymentConfirmation', 'PaymentConfirmController@sendPaymentConfirmation');

// ORDER
Route::get('/order', 'OrderFrontController@index');
Route::get('/order/detail/{orderId}', 'OrderFrontController@orderDetail');

// ADMIN PAGE
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index');

    // PRODUCT
    Route::get('/product', 'Admin\ProductController@index');
    Route::get('/product/add', 'Admin\ProductController@add');
    Route::post('/product/save-product', 'Admin\ProductController@saveProduct');

    // CONTACT
    Route::get('/contact', 'Admin\ContactController@index');

    // TESTIMONI
    Route::get('/testimoni', 'Admin\TestimoniController@index');

    // CONFIRM PAYMENT
    Route::get('/confirm', 'Admin\ConfirmController@index');

    // USER
    Route::get('/user', 'Admin\UserController@index');
    Route::get('/user/add', 'Admin\UserController@add');
    Route::post('/user/save-user', 'Admin\UserController@saveUser');

    // CUSTOMER
    Route::get('/customer', 'Admin\CustomerController@index');
    Route::get('/customer/verified/{userId}', 'Admin\CustomerController@updateStatusVerified');

    // WORK ORDER
    Route::get('/work-order', 'Admin\WorkOrderController@index');
    Route::get('/work-order/add', 'Admin\WorkOrderController@add');
    Route::get('/work-order/print', 'Admin\WorkOrderController@print');
    Route::post('/work-order/save-workorder', 'Admin\WorkOrderController@saveWorkOrder');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
