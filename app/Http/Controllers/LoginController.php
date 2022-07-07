<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $categories = Category::all();
        return view('pages.home.login',[
            'title' => 'Login',
            'active' => '',
            'categories' => $categories,
        ]);
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5',
        ]);

        // if (Auth::attempt(['email'=>$validatedData['email'], 'password' => $validatedData['password'], 'role'=> 'admin'])) {
        //     $request->session()->regenerate();
        //     return response()->json(['message'=>'success, Admin'],200);
        // }elseif (Auth::attempt(['email'=>$validatedData['email'], 'password' => $validatedData['password'], 'role'=> 'user'])) {
        //     $request->session()->regenerate();
        //     return response()->json(['message'=>'success, User'],200);
        // }

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return redirect('login')->with('error','Email dan Password salah!');
    }
}
