<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    public function getBranches(){
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
    }

    public function getCarByBranch(Request $request){
        $cars = Branch::find($request['branch_id'])->cars()->with('carType')->get();
        $cars->makeHidden(['color','tax_rate','is_active','hourly_price','maintenance']);
        return response()->json([
            'cars' => $cars
        ]);
    }
}
