<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        dd("hello");
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt(['email'=>$validatedData['email'], 'password' => $validatedData['password'], 'role'=> 'admin'])) {
            $request->session()->regenerate();
            return response()->json(['message'=>'success, Admin'],200);
        }elseif (Auth::attempt(['email'=>$validatedData['email'], 'password' => $validatedData['password'], 'role'=> 'user'])) {
            $request->session()->regenerate();
            return response()->json(['message'=>'success, User'],200);
        }

        return response()->json(['message'=>'failed'],200);
    }
}
