<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json([
            "status" => 200,
            "user" => $user
        ]);
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email' , 'password'))){
            return response()->json([
                'message' => 'invalid credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt' , $token , 60*24);
        return \response()->json([
            'message' => $token
        ])->withCookie($cookie);
    }

    public function  logout(){
        $cookie = \Illuminate\Support\Facades\Cookie::forget('jwt');
        return \response()->json([
            'message' => 'success'
        ])->withCookie($cookie);
    }

    public function user(){
        return "Authenticated User";
    }
}
