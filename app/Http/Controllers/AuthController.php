<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view("login");
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if (Auth::attempt($validate)) {
            return redirect(RouteServiceProvider::HOME);
        }
        return redirect("/login");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");

    }
}
