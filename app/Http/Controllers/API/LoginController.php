<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!auth()->attempt($data)) return response()->json(['error' => 'Wrong Login Details'], 401);

        $user = auth()->user();

        $token = $user->createToken($data['email']);
        return response()->json([
            'token' => $token->accessToken,
            'user' => $user,
            'isDoctor' => $user->isDoctor(),
            'isPatient' => $user->isPatient(),
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();

        return response()->json(['message' => 'Logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
