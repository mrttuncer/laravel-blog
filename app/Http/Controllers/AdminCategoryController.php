<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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

    public function store(CategoryRequest $request)
    {

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla oluşturuldu.');
    }

    public function edit(Category $category)
    {
        return inertia('Admin/Categories/Edit', compact('category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {

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
