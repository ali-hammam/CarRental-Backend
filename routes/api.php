<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register' , [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login' , [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('countries' , [\App\Http\Controllers\CountryController::class, 'getCountries']);
Route::post('states' , [\App\Http\Controllers\CountryController::class, 'getStates']);


Route::middleware('auth:sanctum')->group(function (){
    Route::get('user' , [\App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout' , [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('agency' , [\App\Http\Controllers\AgencyController::class, 'getAgency']);
    Route::post('addAgency' , [\App\Http\Controllers\AgencyController::class, 'addAgency']);
    Route::get('branches' , [\App\Http\Controllers\AgencyController::class, 'getBranches']);
    Route::post('addBranch' , [\App\Http\Controllers\AgencyController::class, 'addBranch']);
    Route::post('manufacturers' , [\App\Http\Controllers\AgencyController::class, 'getManufacturers']);
    Route::post('addManufacture' , [\App\Http\Controllers\AgencyController::class, 'addManufacturer']);
    Route::post('addCarType' , [\App\Http\Controllers\AgencyController::class, 'addCarType']);
    Route::post('carTypes' , [\App\Http\Controllers\AgencyController::class, 'getCarTypes']);


});

