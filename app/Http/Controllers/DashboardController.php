<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        if (Auth::user()->role === 'admin') {
            $postPublish = Post::orderBy('created_at', 'DESC')->where(['status' => 'publish'])->limit(5)->get();
            $countPostPublish = Post::where(['status' => 'publish'])->count();
            $postArsip = Post::orderBy('created_at', 'DESC')->where(['status' => 'arsip'])->limit(5)->get();
            $countPostArsip = Post::where(['status' => 'arsip'])->count();
        }else{
            $postPublish = Post::orderBy('created_at', 'DESC')->where(['user' => Auth::user()->name, 'status' => 'publish'])->limit(5)->get();
            $countPostPublish = Post::where(['user' => Auth::user()->name, 'status' => 'publish'])->count();
            $postArsip = Post::orderBy('created_at', 'DESC')->where(['user' => Auth::user()->name, 'status' => 'arsip'])->limit(5)->get();
            $countPostArsip = Post::where(['user' => Auth::user()->name, 'status' => 'arsip'])->count();
        }

        return view('pages.dashboard.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'postPublish' => $postPublish,
            'postArsip' => $postArsip,
            'countPostPublish' => $countPostPublish,
            'countPostArsip' => $countPostArsip,
            'categories' => $categories,
        ])->with(['controller' => $this]);
    }

    public function countPostCategory($category)
    {
        if (Auth::user()->role === 'admin') {
            return Post::where(['category' => $category])->count();
        } else {
            return Post::where(['user' => Auth::user()->name, 'category' => $category])->count();
        }
    }
}
