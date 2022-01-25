<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Manufacturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{
    public function getAgency(){
        $user = Auth::user();
        $agency = User::find($user->getAuthIdentifier())->agency()->get();
        if($agency->isEmpty()){
            return response()->json([
                'agencies' => $agency
            ]);
        }

        return response()->json([
            'agencies' => User::find($user->getAuthIdentifier())->agency()->get()[0]
        ]);
    }

    public function addAgency(Request $request){
        $user = Auth::user();
        $agency = Agency::create([
            'name' => $request['agency'],
            'user_id' => $user->getAuthIdentifier()
        ]);

        return response()->json([
            'status' => 200,
            'data' => $agency
        ]);
    }

    /*public function getBranches(){
        $user = Auth::user();
        $branches = Agency::where('user_id', $user->getAuthIdentifier())->with('branches')->get();
        return [
            'status' => 200,
            'branches' => $branches[0]['branches']
        ];
    }

    public function addBranch(Request $request){
        $data = [
            'agency_id' => $request['agency_id'],
            'state_id' => $request['state'],
            'phone' => $request['phone'],
            'name' => $request['name'],
            'tax_record' => $request['tax_record']
        ];

        $branch = Branch::create($data);

        return response()->json([
            'status'=>200,
            'data' => $branch
        ]);
    }*/

    public function getManufacturers(Request $request){
        $manufacturers = Agency::find($request['agency_id'])->manufacturers()->get();
        return [
            'status' => 200,
            'manufacturers' => $manufacturers
        ];
    }

    public function addManufacturer(Request $request){
        $data = [
            'agency_id' => $request['agency_id'],
            'name' => $request['name'],
        ];

        $manufacturer = Manufacturer::create($data);
        return response()->json([
            'status'=>200,
            'data' => $request->all()
        ]);
    }

    /*public function addCarType(Request $request){
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
    }*/

    /*public function getCarByBranch(Request $request){
        $cars = Branch::find($request['branch_id'])->cars()->with('carType')->get();
        $cars->makeHidden(['color','tax_rate','is_active','hourly_price','maintenance']);
        return response()->json([
           'cars' => $cars
        ]);
    }*/

    /*public function updateCarStatus(Request $request){
        $car = Car::where('id' , $request['car_id'])->update([
            $request['field'] => $request[$request['field']]
        ]);

        return response()->json([
            'data' => $request->all()
        ]);
    }*/



}
