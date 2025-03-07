<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        return view('blog.post', compact('post'));
    }
}
