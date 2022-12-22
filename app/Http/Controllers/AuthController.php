<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create(
            array_merge(
                $request->validated(),
                ['password' => bcrypt($request->validated('password'))]
            )
        );

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'result' => [
                'name' => $user->name,
                'access_token' => $token,
            ],
            'message' => "Register Successful",
            'success' => true,
            'code' => 200
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->safe()->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized',
                'success' => false,
                'code' => 401,
            ], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'result' => [
                'name' => $user->name,
                'access_token' => $token,
            ],
            'message' => "Login Successful",
            'success' => true,
            'code' => 200
        ]);
    }
}