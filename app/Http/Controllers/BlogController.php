<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('dashboard.blogs', [
            'title' => 'Blog!',
            'blogs' => Blog::latest()->Filter(request('search'))->paginate(6)->withQueryString()
        ]);
    }

    public function showsingle(Blog $blog)
    {
        return view('dashboard.blog', [
            'title' => 'Blog!',
            'blogs' => Blog::latest()->paginate(6),
            'blog' => $blog
        ]);
    }
}
