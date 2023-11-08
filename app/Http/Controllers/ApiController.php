<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $infoLogin = $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($infoLogin))
        {
            return response([
                "massage" => "Invalid",
            ], 403);
        }

        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('token-name')->plainTextToken,
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'massage' => 'Logout Success'
        ], 200);
    }

    public function data()
    {
        return response([
            'user' => auth()->user()
        ], 200);
    }
}
