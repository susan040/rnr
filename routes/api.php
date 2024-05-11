<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/forget-password', [AuthController::class, 'forgetPassword']);
Route::post('/resetPassword', [AuthController::class, 'resetPassword']);


Route::group(['prefix' => '', 'middleware' => 'auth:api'], function () {
    Route::get('/category', [App\Http\Controllers\Api\CategoryController::class, "allCategory"]);
    Route::get('/vehicle', [App\Http\Controllers\Api\VehicleController::class, "allVehicle"]);
    Route::get('/about-us', [App\Http\Controllers\Api\VehicleController::class, "aboutUs"]);
    Route::post('/order', [App\Http\Controllers\Api\OrderController::class, "postOrder"]);
    Route::get('/viewOrder',  [App\Http\Controllers\Api\OrderController::class, "viewOrder"]);
    Route::get('/onGoingOrder', [App\Http\Controllers\Api\OrderController::class, "onGoingOrder"]);
    Route::post('/change-password',  [App\Http\Controllers\Api\AuthController::class, "changePassword"]);
    Route::post('/available-vehicle', [App\Http\Controllers\Api\OrderController::class, "getAllVehicle"]);
    Route::post('/update-profile',  [App\Http\Controllers\Api\AuthController::class, "updateProfile"]);
    Route::get('/recent-order',  [App\Http\Controllers\Api\OrderController::class, "viewCommingOrder"]);
    Route::post('/khalti/payment/verify', [App\Http\Controllers\Api\OrderController::class, "verifyPayment"]);
    Route::post('/cancelOrder', [App\Http\Controllers\Api\OrderController::class, "cancelOrder"]);
});