<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Models\Transaction;
use App\Models\Account;
use App\Http\Controllers\TransactionController;

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
//Protected Routes
    Route::group(['middleware' => ['auth:sanctum']], function () {
    //Route::post('account/create', 'AccountController@createAccount');
    Route::post('/create', [AccountController::class, 'create']);
    Route::post('/depositOrWitdraw/{account_no}', [TransactionController::class,'depositOrWitdraw']);
    Route::get('/getaccount/{account_no}', [AccountController::class,'getaccount']);
    Route::get('/accounts', function () {
        return Account::all();
    });
    Route::post('/logout',[AuthController::class,'logout']);
    //Route::post('account/deposit/{accountno}','AccountController@depositOrWitdraw');
});

//Public routes 
Route::post('/register',[AuthController::class,'register']);
// Route::post('account/withdraw/{accountno}','AccountController@depositOrWitdraw');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/gettransaction/{accountNo}', [TransactionController::class,'gettransaction']);
Route::get('/transactions', function () {
    return Transaction::all();
});