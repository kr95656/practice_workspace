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


// TOP画面
Route::get('/', function () {
    return view('welcome');
})->name('top');
// Route::get('', 'CustomersController@showCustomers')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

//商品登録機能
Route::middleware('auth')
    ->group(function () {
        // 単品登録
        Route::get('sell_item_register', 'SellItemController@showItemRegisterForm')->name('sell-item');
        Route::post('sell_item_register', 'SellItemController@ItemRegister')->name('sell-item');

        //CSV登録
        Route::get('sell_item_csv_register', 'SellItemController@showItemCsvRegisterForm')->name('sell-item-csv');
        Route::post('sell_item_csv_register', 'SellItemController@ItemCsvRegister')->name('sell-item-csv');
    });

Route::prefix('stuff')
    ->namespace('Stuff')
    ->middleware('auth')
    ->group(function () {
        //プロフィール編集画面
        Route::get('edit_profile', 'ProfileController@showEditProfile')->name('stuffs.edit-profile');
        //プロフィール編集
        Route::post('edit_profile', 'ProfileController@editProfile')->name('stuffs.edit-profile');

        //商品販売画面
        Route::get('registered_items', 'RegisteredItemsController@showRegisteredItems')->name('stuffs.registered-items');

        //担当顧客
        Route::get('charge_customer', 'CustomersController@showCustomers')->name('stuffs.charge-customer');

        //顧客詳細画面
        Route::get('customers/{customer}', 'CustomersController@showCustomerDetails')->name('stuffs.details-charge-customer');

        // 顧客詳細のログ追加画面
        Route::get('customers/{customer}/log_form', 'CustomersController@showLogsCustomer')->name('stuffs.log');

        // 顧客詳細のログ追加
        Route::post('customers/{customer}/log_form', 'CustomersController@postLogsCustomer')->name('stuffs.log');

        // 顧客詳細のログ編集画面
        Route::get('customers/{customer}/log_form_edit/{id}', 'CustomersController@showEditLogsCustomer')->name('stuffs.log-edit');

        // 顧客詳細のログ更新
        Route::post('customers/{customer}/log_form_edit/{id}', 'CustomersController@updateLogsCustomer')->name('stuffs.log-edit');

        // 顧客詳細のログ削除確認画面
        Route::get('customers/{customer}/log_delete/{id}', 'CustomersController@showDeleteLogsCustomer')->name('stuffs.log-delete');

        // 顧客詳細のログ削除
        Route::post('customers/{customer}/log_delete/{id}', 'CustomersController@deleteLogsCustomer')->name('stuffs.log-delete');

    });

Route::prefix('customer')
    ->namespace('Customer')
    ->middleware('auth')
    ->group(function () {
        //顧客登録画面
        Route::get('register', 'RegisterController@showRegisterCustomer')->name('customers.register-customer');

        //顧客登録
        Route::post('register', 'RegisterController@registerCustomer')->name('customers.register-customer');

        // //顧客プロフィール編集
        // Route::post('edit-profile', 'ProfileController@editProfile')->name('stuffs.edit-profile');

        // //商品販売画面
        // Route::get('registered_items', 'RegisteredItemsController@showRegisteredItems')->name('stuffs.registered-items');
    });
