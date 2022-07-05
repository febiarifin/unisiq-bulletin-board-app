<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        dd('hello');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','min:3','unique:users'],
            'email' => ['required','email:dns','unique:users'],
            'password' => 'required|min:5',
        ]);
        $validatedData['role'] = "user";
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return response()->json(['success'=>$validatedData],200);
    }
}
