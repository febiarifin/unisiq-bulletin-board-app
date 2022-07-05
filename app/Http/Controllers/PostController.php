<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return $posts;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => ['required', 'mimes:jpg,jpeg,png,gif,webp', 'max:1024'],
            'content' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['attachment'] = $request->attachment;
        $validatedData['user'] = 'testuser';
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        Post::create($validatedData);
        return response()->json(['success' => $validatedData], 200);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        return $post;
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => ['mimes:jpg,jpeg,png,gif,webp', 'max:1024'],
            'content' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['attachment'] = $request->attachment;
        $validatedData['user'] = 'testuser';
        if($request->file('image')){
            Storage::delete($post->image);
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $post->update($validatedData);
        return response()->json(['success' => $validatedData], 200);
    }

    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);
        Storage::delete($post->image);
        $post->delete();
        return response()->json(['successfully delete...'],200);
    }
}
