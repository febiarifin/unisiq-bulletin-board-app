<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at','DESC')->get();
        return $categories;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','min:3','unique:categories'],
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        Category::create($validatedData);
        return response()->json(['success'=>$validatedData],200);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        return $category;
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
        return response()->json(['success'=>$validatedData],200);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrfail($id);
        $category->delete();
        return response()->json(['successfully delete...']);
    }
}
