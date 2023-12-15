<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('base.welcome');
});

Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/create', [CustomerController::class, 'store']);
Route::get('/customer/{customer}', [CustomerController::class, 'edit']);
Route::post('/customer/{customer}', [CustomerController::class, 'update']);
Route::delete('/customer/delete/{customer}', [CustomerController::class, 'delete']);

Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/create', [OrderController::class, 'create']);
Route::post('/order/create', [OrderController::class, 'store']);
Route::get('/order/{order}', [OrderController::class, 'edit']);
Route::post('/order/{order}', [OrderController::class, 'update']);
Route::delete('/order/delete/{order}', [OrderController::class, 'delete']);


Route::get('/vehicle', [VehicleController::class, 'index']);
Route::get('/vehicle/create', [VehicleController::class, 'create']);
Route::post('/vehicle/create', [VehicleController::class, 'store']);
Route::get('/vehicle/{vehicle}', [VehicleController::class, 'edit']);
Route::post('/vehicle/{vehicle}', [VehicleController::class, 'update']);
Route::delete('/vehicle/delete/{vehicle}', [VehicleController::class, 'delete']);