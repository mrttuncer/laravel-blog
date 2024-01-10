<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('categories')->get();

        return inertia('Admin/Blogs/Index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return inertia('Admin/Blogs/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();

        $blog->categories()->attach($request->category_ids);

        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)

    {
        $blog->load('categories');
        return inertia('Admin/Blogs/Show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $blogCategories = $blog->categories;
        return inertia('Admin/Blogs/Edit', compact('blog', 'categories', 'blogCategories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();

        $blog->categories()->sync($request->category_ids);

        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla güncellendi.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla silindi.');
    }
}
