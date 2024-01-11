<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Blog $blog)
    {
        $user = auth()->user();

        $existingLike = $user->likes()->where('blog_id', $blog->id)->first();

        if (!$existingLike) {
            $user->likes()->create(['blog_id' => $blog->id]);
        } else {
        }
    }

    public function unlike(Blog $blog)
    {
        $user = auth()->user();

        $deleted = $user->likes()->where('blog_id', $blog->id)->delete();
    }
}
