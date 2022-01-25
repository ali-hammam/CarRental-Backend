<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CarController as UserCarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Owner\AgencyController;
use App\Http\Controllers\Owner\BranchController;
use App\Http\Controllers\Owner\CarController as OnwerCarController;
use \App\Http\Controllers\User\RentController;


Route::post('register' , [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login' , [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('countries' , [\App\Http\Controllers\CountryController::class, 'getCountries']);
Route::post('states' , [\App\Http\Controllers\CountryController::class, 'getStates']);


Route::middleware('auth:sanctum')->group(function (){
    Route::get('user' , [AuthController::class, 'user']);
    Route::post('logout' , [AuthController::class, 'logout']);
    Route::get('agency' , [AgencyController::class, 'getAgency']);
    Route::post('addAgency' , [AgencyController::class, 'addAgency']);
    Route::post('manufacturers' , [AgencyController::class, 'getManufacturers']);
    Route::post('addManufacture' , [AgencyController::class, 'addManufacturer']);
    Route::get('branches' , [BranchController::class, 'getBranches']);
    Route::post('addBranch' , [BranchController::class, 'addBranch']);
    Route::post('carByBranch' , [BranchController::class, 'getCarByBranch']);
    Route::post('addCarType' , [OnwerCarController::class, 'addCarType']);
    Route::post('carTypes' , [OnwerCarController::class, 'getCarTypes']);
    Route::post('addCar' , [OnwerCarController::class, 'addCar']);
    Route::put('editCar' , [OnwerCarController::class, 'updateCarStatus']);
    Route::get('cars' , [UserCarController::class, 'getAllCars']);
    Route::post('carsByModel' , [UserCarController::class, 'getAllCarsByModel']);
    Route::post('carsByManufacturer' , [UserCarController::class, 'getAllCarsByManufacturer']);
    Route::post('carsByType' , [UserCarController::class, 'getAllCarsByType']);
    Route::post('rent' , [RentController::class, 'rent']);
    Route::post('reservedCars' , [RentController::class, 'reservedCars']);

});

