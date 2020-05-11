<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view(
            'login',
            array(
                'page_title' => 'The Mount Everest Blog - Login',
				'page_description' => 'Login page'
            )
        );
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->with('failed','Invalid email address and/or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}