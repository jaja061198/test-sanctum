<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user_data = User::where('email',$request->email)->first();
            $token = $user_data->createToken('defaultToken')->plainTextToken;
            return response()->json([
                'message' => 'login success',
                'token' => $token,
            ],200);
        }
 
        return response()->json(['message' => 'Invalid Credentials'],401);
    }
}
