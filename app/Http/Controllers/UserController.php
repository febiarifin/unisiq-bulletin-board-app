<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->where('role', 'user')->paginate(10);
        return view('pages.user.users',[
            'title' => 'Manajemen User',
            'active' => 'users',
            'users' => $users,
            'no' => 1,
        ]);
    }

    public function edit($name)
    {
        if (Auth::user()->name !== $name) {
            return abort(404);
        }
        $user = User::where('name', $name)->first();
        return view('pages.profile.edit', [
            'title' => 'Edit profil',
            'active' => 'profile',
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        if ($request->password) {
            $validatedData = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email:dns'],
                'password' => 'min:5',
                'image' => 'mimes:jpg,jpeg,png|max:1024'
            ]);
            $validatedData['password'] = Hash::make($request->password);
        } else {
            $validatedData = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email:dns'],
                'image' => 'mimes:jpg,jpeg,png|max:1024'
            ]);
            $validatedData['password'] = $request->old_password;
        }
        if ($request->file('image')) {
            Storage::delete($user->image);
            $validatedData['image'] = $request->file('image')->store('user-images');
        }
        $user->update($validatedData);
        return redirect('user/profile/' . $request->name)->with('success', 'Profil berhasil diupdate');
    }

    public function activated(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        $data = [
            'status' => 'active'
        ];
        $user->update($data);
        return redirect('users')->with('success','User berhasil diaktifkan');
    }

    public function banned(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id); 
        $data = [
            'status' => 'banned'
        ];
        $user->update($data);
        return redirect('users')->with('success','User berhasil dibanned');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        Storage::delete($user->image);
        $user->delete();
        return response()->json(['successfully delete...'], 200);
    }
}
