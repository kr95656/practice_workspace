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
Route::get('', 'CustomersController@showCustomers')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('customers/{customer}', function () {return "商品詳細";})->name('customer');

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
        Route::get('edit-profile', 'ProfileController@showEditProfile')->name('stuffs.edit-profile');
        //プロフィール編集
        Route::post('edit-profile', 'ProfileController@editProfile')->name('stuffs.edit-profile');

        //商品販売画面
        Route::get('registered_items', 'RegisteredItemsController@showRegisteredItems')->name('stuffs.registered-items');
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
