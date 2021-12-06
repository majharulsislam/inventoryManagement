<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});


//=====> Backend Routes
Auth::routes();
// Login Form
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');

// admin group here
Route::group(['namespace' => 'App\Http\Controllers\Admin'], function() {
  Route::group(['prefix' => 'admin'], function(){

    // Dashboard--------------
    Route::get('/dashboard', 'PagesCotroller@index')->name('admin.dashboard');

    // Employee routes---------
    Route::get('/employee/all', 'EmployeeController@index')->name('all.employee');
    Route::get('/employee/add', 'EmployeeController@create')->name('add.employee');
    Route::post('/employee/store', 'EmployeeController@store')->name('store.employee');
    Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('edit.employee');
    Route::post('/employee/update/{id}','EmployeeController@update')->name('update.employee');
    Route::get('/employee/destroy/{id}','EmployeeController@destroy')->name('destroy.employee');

    // Customer routes---------
    Route::get('/customer/all', 'CustomerController@index')->name('all.customer');
    Route::get('/customer/add', 'CustomerController@create')->name('add.customer');
    Route::post('/customer/store', 'CustomerController@store')->name('store.customer');
    Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('edit.customer');
    Route::post('/customer/update/{id}','CustomerController@update')->name('update.customer');
    Route::get('/customer/destroy/{id}','CustomerController@destroy')->name('destroy.customer');

    // Suppliers routes---------
    Route::get('/supplier/all', 'SupplierController@index')->name('all.supplier');
    Route::get('/supplier/add', 'SupplierController@create')->name('add.supplier');
    Route::post('/supplier/store', 'SupplierController@store')->name('store.supplier');
    Route::get('/supplier/edit/{id}', 'SupplierController@edit')->name('edit.supplier');
    Route::post('/supplier/update/{id}','SupplierController@update')->name('update.supplier');
    Route::get('/supplier/destroy/{id}','SupplierController@destroy')->name('destroy.supplier');

    // Advance Salary routes---------
    Route::get('/salary/advancesalary', 'AdvancesalaryController@index')->name('all.advancesalary');
    Route::get('/salary/advancesalary/create', 'AdvancesalaryController@create')->name('create.advancesalary');
    Route::post('/salary/advancesalary/store', 'AdvancesalaryController@store')->name('store.advancesalary');
    Route::post('/salary/advancesalary/update/{id}', 'AdvancesalaryController@update')->name('update.advancesalary');
    Route::get('/salary/advancesalary/destroy/{id}', 'AdvancesalaryController@destroy')->name('destroy.advancesalary');

    // Categor routes-----------
    Route::get('/category/all', 'CategoryController@index')->name('all.category');
    Route::post('/category/store', 'CategoryController@store')->name('store.category');
    Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('destroy.category');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('update.category');

    // Products-------------
    Route::get('/product/all', 'ProductController@index')->name('all.product');
    Route::get('/product/add', 'ProductController@create')->name('add.product');
    Route::post('/product/store', 'ProductController@store')->name('store.product');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('edit.product');
    Route::post('/product/update/{id}','ProductController@update')->name('update.product');
    Route::get('/product/destroy/{id}','ProductController@destroy')->name('destroy.product');

    // Expences-------------
    Route::get('/expences/all', 'ExpencesController@index')->name('all.expences');
    Route::get('/expences/add', 'ExpencesController@create')->name('add.expences');
    Route::post('/expences/store', 'ExpencesController@store')->name('store.expences');
    Route::post('/expences/update/{id}','ExpencesController@update')->name('update.expences');
    Route::get('/expences/destroy/{id}','ExpencesController@destroy')->name('destroy.expences');
    Route::get('/expences/today','ExpencesController@todayExpences')->name('today.expences');
    Route::get('/expences/month','ExpencesController@monthExpences')->name('month.expences');
    Route::get('/expences/year','ExpencesController@yearExpences')->name('year.expences');

    // Attendence-------------
    Route::get('/attendence/take', 'AttendenceController@takeattendence')->name('take.attendence');
    Route::get('/attendence/all', 'AttendenceController@Allattendence')->name('all.attendence');
    Route::post('/attendence/store', 'AttendenceController@store')->name('store.attendence');

    // Settings
     //Route::get('/settings/setting', 'SettingController@store')->name('settings');


    // POS (Point Of Sale)
    Route::get('/pos', 'PosController@index')->name('pos');
    Route::post('/create-invoice', 'PosController@createinvoice')->name('create.invoice');
    Route::post('/order-store', 'PosController@store')->name('order.store');
    // orders
    Route::get('/orders/pending', 'PosController@OrderPending')->name('orders.pending');
    Route::get('/orders/success', 'PosController@OrderSuccess')->name('orders.success');
    Route::get('/orders/view-order/{id}', 'PosController@OrderView')->name('order.view');
    Route::post('/orders/update/{id}', 'PosController@OrderUpdate')->name('order.update');

    // Cart Added
    Route::post('/add-to-cart', 'CartController@store')->name('add.cart');
    Route::post('/cart-update/{rowId}', 'CartController@update')->name('cart.update');
    Route::get('/cart-remove/{rowId}', 'CartController@destroy')->name('cart.remove');

  });

});
