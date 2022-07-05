<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at','DESC')->where('role','user')->get();
        return $users;
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        return $user;
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email:dns'],
            'password' => 'required|min:5',
            'image' => 'mimes:jpg,jpeg,png|max:1024'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        if ($request->file('image')) {
            Storage::delete($user->image);
            $validatedData['image'] = $request->file('image')->store('user-images');
        }
        $user->update($validatedData);
        return response()->json(['success'=>$validatedData],200);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        Storage::delete($user->image);
        $user->delete();
        return response()->json(['successfully delete...'],200);
    }
}
