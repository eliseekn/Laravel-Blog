<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login', [
            'page_title' => 'The Mount Everest Blog - Login',
            'page_description' => 'Login page'
        ]);
    }

    public function login(LoginRequest $loginRequest)
    {
        $loginRequest->validated();

        $credentials = $loginRequest->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->with('failed', 'Incorrect email address and/or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
