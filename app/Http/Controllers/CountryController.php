<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;

class CountryController extends Controller
{
    public function getCountries(){
        return response()->json(Country::all());
    }

    public function getStates(Request $request){
        //return  \response()->json($request->all());
        return response()->json(State::where('country_id', $request->input('country_id'))->get());
    }
}
