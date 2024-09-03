<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(request $request){
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('Laravel Personal Access Token')->accessToken;

            $data['token']= $token;
            $data['user']= $user;

            return response()->json($data,200);

        } else {
           return response()->json(['error'=>'Unauthorized'], 401);
        }


    }


}
