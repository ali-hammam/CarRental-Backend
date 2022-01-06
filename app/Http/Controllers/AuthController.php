<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function userRegisterInfo(Request $request){
        return [
            'fname' => $request['fname'],
            'mname' => $request['mname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'ssn' => $request['ssn'],
            'driver_licence' => $request['driver_licence'],
            //'image' => $request['image'],
            'state_id' => 5
        ];
    }

    public function register(Request $request){
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        //$user = User::create(/*$this->userRegisterInfo($request)*/ $request->all());

        return response()->json([
            "status" => 200,
            "user" =>  $request->all()
        ]);
    }

    public function login(Request $request){
        //return$this->loginValidation($request);
        if(!Auth::attempt($request->only('email' , 'password')) /*!$this->loginValidation($request)*/){
            return response()->json([
                'message' => 'invalid credentials',
                'data' => $request->all()
            ], Response::HTTP_UNAUTHORIZED);
        }

        //$user = User::where('email', $request['email'])->first();
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt' , $token , 60*24);
        return response()->json([
            'message' => $token,
            'user' => $user
        ])->withCookie($cookie);
    }

    public function  logout(){
        $cookie = \Illuminate\Support\Facades\Cookie::forget('jwt');
        return \response()->json([
            'message' => 'success'
        ])->withCookie($cookie);
    }

    public function user(){
        return response()->json([
            'user' => Auth::user()
        ]);
        //return Auth::user();
    }

    public function loginValidation(Request $request){
        $user = User::where('email', $request['email'])->first();
        if($user) {
            $user->makeVisible(['password']);
            return $user['password'] === $request['password'];
        }
        return 0;
    }
}
