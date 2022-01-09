<?php

namespace App\Http\Controllers;

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
}
