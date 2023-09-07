<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:categories',
            'color' => 'required|min:3|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('message', 'Categoria creada!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:categories,slug,' . $category->id,
            'color' => 'required|min:3|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
