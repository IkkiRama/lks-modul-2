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
        // dd($request->all());
        $validate = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if (Auth::attempt($request->only(["email", "password"]))) {
            return redirect("/");
        }
        return redirect("/login");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");

    }
}
