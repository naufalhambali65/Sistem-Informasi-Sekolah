<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.index', [
            'title' => 'Blogs',
            'datas' => Blog::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create', [
            'title' => 'Add Blog'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:blogs',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);

        if($request->file('image')){
            // melakukan validasi untuk gambar jika gambar tidak kosong, kemudian akan menyimpan gambar ke folder post-images
            $validatedData['image'] = $request->file('image')->store('blog-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($request->body, 200, '...'); // Str::limit untuk membatasi string

        Blog::create($validatedData);

        return redirect('/admin/blog')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', [
            'title' => 'Detail Blog',
            'data' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', [
            'title' => 'Update Data',
            'data' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        if($request->slug != $blog->slug){
            $rules['slug'] = 'required|unique:blogs';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            // melakukan validasi untuk gambar jika gambar tidak kosong, kemudian akan menyimpan gambar ke folder post-images
            $validatedData['image'] = $request->file('image')->store('blog-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($request->body, 200, '...'); // Str::limit untuk membatasi string

        Blog::where('id', $blog->id)->update($validatedData);

        return redirect('/admin/blog')->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->image){
            Storage::delete($blog->image);
        }
        blog::destroy($blog->id);
        return redirect('/admin/blog')->with('success', 'Data Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);

    }
}
