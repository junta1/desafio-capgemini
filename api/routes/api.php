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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('saldo/{id}', '\Bank\Http\Controllers\BalanceController@index');
//Route::post('saque', '\Bank\Http\Controllers\WithdrawController@store');
//Route::post('deposito', '\Bank\Http\Controllers\DepositController@store');
//
//Route::get('movimentacao/{idAccount}', '\Bank\Http\Controllers\MovimentController@index');
