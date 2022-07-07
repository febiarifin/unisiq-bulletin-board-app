<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('created_at','DESC')->where(['status' => 'publish'])->paginate(9);
        $postRandom = Post::inRandomOrder()->where(['status' => 'publish'])->limit(3)->get();
        return view('pages.home.home',[
            'title' => 'Unsiq Bulletin Board',
            'active' => 'home',
            'categories' => $categories,
            'posts' => $posts, 
            'postRandom' => $postRandom,
        ]);
    }

    public function postCategory($category)
    {
        $categories = Category::all();
        $posts = Post::orderBy('created_at','DESC')->where(['status'=>'publish','category' => $category])->paginate(9);
        if ($posts->isEmpty()) {
            return abort(404);
        }
        return view('pages.home.postCategory',[
            'title' => 'Kategori : '.Str::slug($category),
            'active' => $category,
            'categories' => $categories,
            'posts' => $posts, 
        ]);
    }

    public function postUser($user)
    {
        $categories = Category::all();
        $posts = Post::orderBy('created_at','DESC')->where(['status'=>'publish','user' => $user])->paginate(9);
        if ($posts->isEmpty()) {
            return abort(404);
        }
        return view('pages.home.postUser',[
            'title' => 'User : '.$user,
            'active' => '',
            'categories' => $categories,
            'posts' => $posts, 
        ]);
    }

    public function showPost($user, $slug)
    {
        $categories = Category::all();
        $post = Post::where(['status' => 'publish','user' => $user,'slug' => $slug])->first();
        $posts = Post::orderBy('created_at','DESC')->where(['status' => 'publish'])->limit(6)->get();
        if (!$post) {
            return abort(404);
        }
        return view('pages.home.showPost',[
            'title' => $post->title,
            'active' => '',
            'categories' => $categories,
            'post' => $post, 
            'posts' => $posts
        ]);
    }

    public function searchPost(Request $request)
    {
        $categories = Category::all();
        $posts = Post::orderBy('created_at','DESC')->where('title', 'LIKE', '%' . $request->keyword . '%')->where('status', 'publish')->get();
        if ($posts->isEmpty()) {
            return back()->with('error','Hasil pencarian tidak ditemukan');
        }
        return view('pages.home.search',[
            'title' => 'Keyword : '.$request->keyword,
            'active' => '',
            'categories' => $categories,
            'posts' => $posts, 
        ]);
    }

    public function sendMessage(Request $request)
    {
        return back()->with('success','Berhasil terkirim');
    }
}
