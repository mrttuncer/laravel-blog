<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return inertia('Admin/Categories/Index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return inertia('Admin/Categories/Create');
    }

    public function show(Category $category)
    {
        $category->load('blogs');
        return inertia('Admin/Categories/Show', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla oluşturuldu.');
    }

    public function edit(Category $category)
    {
        return inertia('Admin/Categories/Edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla güncellendi.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla silindi.');
    }
}
