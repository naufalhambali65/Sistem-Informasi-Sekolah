<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.teacher.index', [
            'title' => 'Teachers',
            'datas' => Teacher::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teacher.create', [
            'title' => 'Input Data Teacher',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'mapel' => 'required|max:255',
            'image' => 'image|file|max:2048',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('teacher-images');
        }

        Teacher::create($validatedData);

        return redirect('/admin/teacher')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teacher.edit', [
            'title' => 'Update Data Teacher',
            'data' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $rules = [
            'name' => 'required|max:255',
            'mapel' => 'required|max:255',
            'image' => 'image|file|max:2048',
        ];


        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('teacher-images');
        }

        Teacher::where('id', $teacher->id)->update($validatedData);

        return redirect('/admin/teacher')->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if($teacher->image){
            Storage::delete($teacher->image);
        }
        teacher::destroy($teacher->id);
        return redirect('/admin/teacher')->with('success', 'Data Berhasil Dihapus!');
    }
}
