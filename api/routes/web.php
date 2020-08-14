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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('saldo/{id}', '\Bank\Http\Controllers\BalanceController@index');
Route::post('saque', '\Bank\Http\Controllers\WithdrawController@store');
Route::post('deposito', '\Bank\Http\Controllers\DepositController@store');

Route::get('movimentacao/{idAccount}', '\Bank\Http\Controllers\MovimentController@index');
