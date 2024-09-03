<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $system = $request->system;
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            switch($system){
                case 'gcais':
                    $token = $user->createToken('Sistem GCAIS')->accessToken;
                    break;
                default:
                    $token = $user->createToken('Laravel Personal Access Client')->accessToken;
            }

            $data['token'] = $token;
            $data['user'] = $user;

            return response()->json($data, 200);
        }else{
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
}
