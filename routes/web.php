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

Route::view('/', 'welcome');

Auth::routes(['register'=>false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/users', 'UserController')->middleware('can:isAdmin');

    Route::resource('/categories', 'CategoryController')->middleware('can:isAdmin');

    Route::resource('/customers', 'CustomerController');

    Route::match(["GET", "POST"], '/orders/success', 'OrderController@success')->name('orders.success')->middleware('can:isAdmin');
    Route::resource('/orders', 'OrderController');

    Route::post('/members/addMain', 'MemberController@addMainMember');

    Route::delete('/members/deleteMain/{id}', 'MemberController@deleteMainMember');
    Route::resource('/members', 'MemberController');

    /* Route::get('settings', "SettingController@index")->name('settings.index')->middleware('can:isAdmin');
    Route::put('settings/{id}', "SettingController@update")->name('settings.update')->middleware('can:isAdmin'); */
});

