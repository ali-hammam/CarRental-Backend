<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getAllCars(){
        $cars = Agency::with('user')->with('manufacturers', function($q){
            $q->with('carTypes',function ($query){
                $query->with('cars',function ($query2){
                    $query2->whereDoesntHave('rentals');
                });
            });
        })->get();

        return [
            'cars' => $cars
        ];
    }

    public function getAllCarsByModel(Request $request){
        $cars = Agency::with('user')->with('manufacturers', function($q) use ($request){
            $q->with('carTypes',function ($query) use ($request){
                $query->where('model', '=', $request['model'])->with('cars');
            });
        })->get();

        return [
            'cars' => $cars
        ];
    }

    public function getAllCarsByManufacturer(Request $request){
        $cars = Agency::with('user')->with('manufacturers', function($q) use ($request){
            $q->where('name','=',$request['manufacturer'])->with('carTypes',function ($query){
                $query->with('cars');
            });
        })->get();

        return [
            'cars' => $cars
        ];
    }

    public function getAllCarsByType(Request $request){
        $cars = Agency::with('user')->with('manufacturers', function($q) use ($request){
            $q->with('carTypes',function ($query) use ($request){
                $query->where('type','=', $request['type'])->with('cars');
            });
        })->get();

        return [
            'cars' => $cars
        ];
    }
}
