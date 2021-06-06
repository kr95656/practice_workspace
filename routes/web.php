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

Route::get('/', function () {
    return view('welcome');
})->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::middleware('auth')
    ->group(function () {
        Route::get('sell_item_register', 'SellItemController@showItemRegisterForm')->name('sell-item');
    });


Route::prefix('stuff')
    ->namespace('Stuff')
    ->middleware('auth')
    ->group(function () {
        Route::get('edit-profile', 'ProfileController@showEditProfile')
            ->name('stuffs.edit-profile');
        Route::post('edit-profile', 'ProfileController@editProfile')
            ->name('stuffs.edit-profile');
    });
