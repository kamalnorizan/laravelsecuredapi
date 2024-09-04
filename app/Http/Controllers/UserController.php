<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function getallusers() {
        $users = User::all();
        return response()->json($users);
    }

    function getuser($user) {

        try {
            $user = User::find($user);
            throw_if(!$user, \Throwable::class);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User not found'], 400);
        }
        return response()->json($user);

    }

    function getProfile(){
        $user = Auth::user();
        return response()->json($user);
    }

    function logout(Request $request){

        if($request->has('revokeAll') && $request->revokeAll == true){
            $user = Auth::user();
            $user->tokens->each(function ($token, $key) {
                $token->revoke();
            });
        }else{
            $user = Auth::user();
            $accessToken = $user->token();
            $accessToken->revoke();
        }

        return response()->json(['message' => 'Successfully logged out']);
    }
}
