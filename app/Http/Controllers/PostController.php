<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $posts = Post::orderBy('created_at', 'DESC')->where('status', 'publish')->paginate(10);
        } else {
            $posts = Post::orderBy('created_at', 'DESC')->where('user', Auth::user()->name)->paginate(10);
        }

        return view('pages.post.posts', [
            'title' => 'Manajemen Post',
            'active' => 'posts',
            'posts' => $posts,
            'no' => 1,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.post.create', [
            'title' => 'Buat Postingan',
            'active' => 'posts',
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => ['required', 'mimes:jpg,jpeg,png,gif,webp', 'max:1024'],
            'content' => 'required',
            'status' => 'required',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['attachment'] = $request->attachment;
        $validatedData['user'] = Auth::user()->name;
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        Post::create($validatedData);
        return redirect('posts')->with('success', 'Postingan berhasil disimpan');
    }

    public function publish(Request $request)
    {
        $id = $request->id;
        if (Auth::user()->name === $request->user) {
            $post = Post::findOrFail($id);
            $data = [
                'status' => 'publish'
            ];
            $post->update($data);
            return redirect('posts')->with('success', 'Postingan berhasil dipublish');
        }
        return abort(404);
    }

    public function arsip(Request $request)
    {
        $id = $request->id;
        if (Auth::user()->name === $request->user || Auth::user()->role === 'admin') {
            $post = Post::findOrFail($id);
            $data = [
                'status' => 'arsip'
            ];
            $post->update($data);
            return redirect('posts')->with('success', 'Postingan berhasil diarsipkan');
        }
        return abort(404);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $categories = Category::all();
        $post = Post::findOrFail($id);
        if (Auth::user()->name !== $post->user) {
            return abort(404);
        }
        return view('pages.post.edit', [
            'title' => 'Edit Postingan',
            'active' => 'posts',
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        if (Auth::user()->name !== $post->user) {
            return abort(404);
        }
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'category' => 'required',
                'image' => ['mimes:jpg,jpeg,png,gif,webp', 'max:1024'],
                'content' => 'required',
                'status' => 'required',
            ]);
            $validatedData['slug'] = Str::slug($validatedData['title']);
            $validatedData['attachment'] = $request->attachment;
            $validatedData['user'] = Auth::user()->name;
            if($request->file('image')){
                Storage::delete($post->image);
                $validatedData['image'] = $request->file('image')->store('post-images');
            }
            $post->update($validatedData);
            return redirect('posts')->with('success','Postingan berhasil diupdate');
        } catch (Exception $e) {
            return redirect('posts')->with('error','Postingan gagal diupdate');
        }
    }

    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if (Auth::user()->name !== $post->user) {
            return abort(404);
        }
        Storage::delete($post->image);
        $post->delete();
        return redirect('posts')->with('success', 'Postingan berhasil dihapus');
    }

    public function previewPost($user, $slug)
    {
        $categories = Category::all();
        $post = Post::where(['status' => 'arsip','user' => $user,'slug' => $slug])->first();
        if (!$post) {
            return abort(404);
        }
        return view('pages.home.previewPost',[
            'title' => $post->title,
            'active' => '',
            'categories' => $categories,
            'post' => $post, 
        ]);
    }
}
