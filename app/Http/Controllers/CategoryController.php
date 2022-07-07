<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories = Category::orderBy('created_at','DESC')->paginate(5);
        return view('pages.category.categories',[
            'title' => 'Manajemen Kategori',
            'active' => 'categories',
            'categories' => $categories,
            'no' => 1,
            'form' => 'categoryStore',
            'categoryId' => '',
            'categoryName' => '',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','min:3','unique:categories'],
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        Category::create($validatedData);
        return redirect('categories')->with('success','Kategori berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        $categories = Category::orderBy('created_at','DESC')->paginate(5);
        return view('pages.category.categories',[
            'title' => 'Manajemen Kategori',
            'active' => 'categories',
            'categories' => $categories,
            'no' => 1,
            'form' => 'categoryUpdate',
            'categoryId' => $category->id,
            'categoryName' => $category->name,
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        $validatedData = $request->validate([
            'name' => ['required','min:3','unique:categories'],
        ]);
        $validatedData['slug']= Str::slug($validatedData['name']);
        $category->update($validatedData);
        return redirect('categories')->with('success','Kategori berhasil diupdate');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrfail($id);
        $category->delete();
        return redirect('categories')->with('success','Kategori berhasil dihapus');
    }
}
