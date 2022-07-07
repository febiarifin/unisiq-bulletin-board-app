<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $categories = Category::all();
        return view('pages.home.register',[
            'title' => 'Daftar',
            'active' => '',
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','min:3','unique:users'],
            'email' => ['required','email:dns','unique:users'],
            'password' => 'required|min:5',
        ]);
        $validatedData['role'] = "user";
        $validatedData['status'] = "active";
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('login')->with('success','Pendaftaran berhasil');
    }
}
