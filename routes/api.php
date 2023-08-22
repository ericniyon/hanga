<?php

use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Testing\TestingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v2\DigitalFinanceController;


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

Route::get('/iworkers', [DigitalFinanceController::class, 'iworkers'])->name('iworkers');
Route::get('/treasury', [DigitalFinanceController::class, 'treasury'])->name('treasury');

// route to login & signup with ihuzo
Route::post('/login-with-ihuzo', [LoginController::class, 'loginWithihuzo'])->name('login.with.ihuzo');
Route::post('/signUp-with-ihuzo', [LoginController::class, 'signUpWithihuzo'])->name('signUp.with.ihuzo');

Route::post('/testsignup', [TestingController::class, 'testsignup'])->name('test.signup');
Route::post('/testLogin', [TestingController::class, 'testLogin'])->name('test.login');
