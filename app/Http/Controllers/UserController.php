<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);

    }
}
