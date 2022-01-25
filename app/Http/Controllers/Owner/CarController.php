<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Car;
use App\Models\CarType;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function addCarType(Request $request){
        $data = [
            'manufacturer_id' => $request['manufacturer_id'],
            'model' => $request['model'],
            'type' => $request['type'],
            'number_of_seats' => $request['number_of_seats'],
            'year' => $request['year']
        ];

        $carType = CarType::create($data);
        return response()->json([
            'status'=>200,
            'data' => $request->all()
        ]);
    }

    public function getCarTypes(Request $request){
        $data =  Agency::find($request['agency_id'])->manufacturers()->with('carTypes')->get();

        $carTypes = $data->map(function($elemnt, $value){
            return $elemnt['carTypes']->map(function($e, $v){
                return [
                    'id' => $e['id'],
                    'model' => $e['model']
                ];
            });
        });

        return response()->json([
            'status'=>200,
            'data' => $carTypes[0],
        ]);
    }

    public function addCar(Request $request){
        $carType = Car::create($request->all());
        return response()->json([
            'status'=>200,
            'data' => $carType
        ]);
    }

    public function updateCarStatus(Request $request){
        $car = Car::where('id' , $request['car_id'])->update([
            $request['field'] => $request[$request['field']]
        ]);

        return response()->json([
            'data' => $request->all()
        ]);
    }
}
