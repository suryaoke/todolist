<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function Register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);


        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return response()->json([
            'status' => true,
            'message' => 'user register succesfully'
        ]);
    }


    public function login(Request $request)
    {
        // data validation

        $request->validate([
            'username' => 'required',
            'password' => 'required',

        ]);

        // Jwt validatiion
        $token = JWTAuth::attempt([
            'username' => $request->username,
            'password' => $request->password,

        ]);
        if (!empty($token)) {
            return response()->json([
                'status' => true,
                'message' => 'User Login Successfully',
                'token ' => $token
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'invalid details'
        ]);

        // response
    }
}
