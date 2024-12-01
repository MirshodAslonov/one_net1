<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->route('homePage');
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return view('Auth.login');
    }
}
