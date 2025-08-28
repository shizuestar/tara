<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('public.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request...
    }

    public function showRegisterForm(Request $request)
    {
        return view('public.auth.register');
    }

    public function register(Request $request)
    {
        // Validate the request...
    }
    public function logout(Request $request){
        // Validate the request...
    }
}
