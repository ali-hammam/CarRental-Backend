<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\CarType;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function rent(Request $request){
        $user = Auth::user();
        $data = [
            'pick_date' => $request['pickup'],
            'from' => $request['from'],
            'to' => $request['to'],
            'car_id' => $request['car_id'],
            'user_id' => $user->getAuthIdentifier()
        ];

        $createRent = Rental::create($data);
        return response()->json([
            'date' => $createRent
        ]);
    }

    public function reservedCars(Request $request){
        $branch = Branch::find($request['branch_id'])->cars()->get();

        $car_type = $branch->map(function($b){
            return CarType::find($b['car_type_id']);
        });

        return[
            'cars' => $branch,
            'car_types' => $car_type
        ];
    }
}
