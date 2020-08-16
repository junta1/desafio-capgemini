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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('account', '\Bank\Http\Controllers\AccountController');
Route::get('balance/{id}', '\Bank\Http\Controllers\BalanceController@index');
Route::post('withdraw', '\Bank\Http\Controllers\WithdrawController@store');
Route::post('deposit', '\Bank\Http\Controllers\DepositController@store');

Route::get('moviment/{idAccount}', '\Bank\Http\Controllers\MovimentController@index');
