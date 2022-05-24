<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\DeliveryJobController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingImagesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VehicleController;

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

Route::post('vehicles/registerVehicle',[VehicleController::class,'registerVehicle']);
Route::post('vehicles/deletevehicle',[VehicleController::class,'deletevehicle']);
Route::post('vehicles/updateVehicle',[VehicleController::class,'updateVehicle']);

Route::get('vehicles/getVehicles',[VehicleController::class,'getVehicles']);

Route::get('vehicles/getVehicleByID/{id}',[VehicleController::class,'getVehicleByID']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
