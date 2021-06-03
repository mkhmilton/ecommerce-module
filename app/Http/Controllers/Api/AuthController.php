<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Invalid credential',
            ], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('AuthToken')->plainTextToken;
        $response = [
          'user' => $user,
          'token' => $token,
        ];

        return response($response, 201);
    }


    public function registration(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('AuthToken')->plainTextToken;

        $response = [
          'user' => $user,
          'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(){
        $user = Auth::user();

        $user->tokens()->delete();

        $response = [
            'message' => 'Successfully Logout',
        ];

        return response($response, 201);
    }
}
