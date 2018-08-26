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
Route::get('/unverified', 'HomeController@unverified');

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
Route::post('select-amount', ['as'=>'select-amount', 'uses'=>'PaymentConfirmController@selectAmountAjax']);

// PROFILE
Route::get('/edit-profile', 'ProfileController@editProfile');
Route::post('/update-profile/{id}', 'ProfileController@updateProfile');
Route::get('/change-password', 'ProfileController@changePassword');
Route::post('/update-password', 'ProfileController@updatePassword');

// ORDER
Route::get('/order', 'OrderFrontController@index');
Route::get('/order/detail/{orderId}', 'OrderFrontController@orderDetail');

// ADMIN PAGE
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index');

    // BANK
    Route::get('/bank', 'Admin\BankAccountController@index');
    Route::get('/bank/add', 'Admin\BankAccountController@add');
    Route::post('/bank/save', 'Admin\BankAccountController@save');
    Route::get('/bank/edit/{id}', 'Admin\BankAccountController@edit');
    Route::post('/bank/update/{id}', 'Admin\BankAccountController@update');
    Route::get('/bank/delete/{id}', 'Admin\BankAccountController@delete');
    
    // PRODUCT
    Route::get('/product', 'Admin\ProductController@index');
    Route::get('/product/add', 'Admin\ProductController@add');
    Route::post('/product/save-product', 'Admin\ProductController@saveProduct');
    Route::get('/product/edit/{id}', 'Admin\ProductController@edit');
    Route::post('/product/update/{id}', 'Admin\ProductController@update');
    Route::get('/product/delete/{id}', 'Admin\ProductController@delete');

    // CONTACT
    Route::get('/contact', 'Admin\ContactController@index');

    // ORDER
    Route::get('/order', 'Admin\OrderController@index');
    Route::get('/order/edit/{orderId}', 'Admin\OrderController@edit');
    Route::get('/order/complete/{orderId}', 'Admin\OrderController@complete');
    Route::post('/order/update/{orderId}', 'Admin\OrderController@update');

    // TESTIMONI
    Route::get('/testimoni', 'Admin\TestimoniController@index');

    // CONFIRM PAYMENT
    Route::get('/reject/{order_id}', 'Admin\ConfirmController@reject');
    Route::post('/reject/save', 'Admin\ConfirmController@save');
    Route::get('/confirm', 'Admin\ConfirmController@index');
    Route::get('/confirm/verified/{order_id}', 'Admin\ConfirmController@verifiedPayment');
    Route::get('/confirm/view/{id}', 'Admin\ConfirmController@view');

    // USER
    Route::get('/user', 'Admin\UserController@index');
    Route::get('/user/add', 'Admin\UserController@add');
    Route::post('/user/save-user', 'Admin\UserController@saveUser');
    Route::get('/user/edit/{id}', 'Admin\UserController@edit');
    Route::post('/user/update/{id}', 'Admin\UserController@update');
    Route::get('/user/delete/{id}', 'Admin\UserController@delete');

    // CUSTOMER
    Route::get('/customer', 'Admin\CustomerController@index');
    Route::get('/customer/verified/{userId}', 'Admin\CustomerController@updateStatusVerified');

    // WORK ORDER
    Route::get('/work-order', 'Admin\WorkOrderController@index');
    Route::get('/work-order/add', 'Admin\WorkOrderController@add');
    Route::get('/work-order/print/{id}', 'Admin\WorkOrderController@print');
    Route::post('/work-order/save-workorder', 'Admin\WorkOrderController@saveWorkOrder');
    Route::get('/work-order/edit/{id}', 'Admin\WorkOrderController@edit');
    Route::post('/work-order/update-workorder/{id}', 'Admin\WorkOrderController@update');
    Route::post('select-customer', ['as'=>'select-customer', 'uses'=>'Admin\WorkOrderController@selectCustomerAjax']);

    //LAPORAN
    Route::get('/laporan-order-bydate', 'Admin\LaporanController@lapOrderByDate');
    Route::post('/laporan-order-bydate/print', 'Admin\LaporanController@printByDate');

    Route::get('/laporan-order-bycustomer', 'Admin\LaporanController@lapOrderByCustomer');
    Route::post('/laporan-order-bycustomer/print', 'Admin\LaporanController@printByCustomer');

    Route::get('/laporan-confirm-bydate', 'Admin\LaporanController@lapConfirmByDate');
    Route::post('/laporan-confirm-bydate/print', 'Admin\LaporanController@printConfirmByDate');

    Route::get('/laporan-confirm-bycustomer', 'Admin\LaporanController@lapConfirmByCustomer');
    Route::post('/laporan-confirm-bycustomer/print', 'Admin\LaporanController@printConfirmByCustomer');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
