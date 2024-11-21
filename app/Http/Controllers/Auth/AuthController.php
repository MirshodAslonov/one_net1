<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        if (!auth()->attempt($credentials,$request->get('remember_me'))) {
           throwError('Auth not found!');
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return success([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
