<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index',[
            'title' => 'Halaman user',
            'datas' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.edit', [
            'title' => 'Update Data',
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'authenticate' => 'required',

        ];

        if($request->username != $user->username){
            $rules['username'] = 'required|min:3|unique:users';
        }
        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);


        User::where('id', $user->id)->update($validatedData);

        return redirect('/admin/user')->with('success', 'Akun Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->blog()->exists()) {
            Blog::where('user_id', $user->id)->delete();
        }
        User::destroy($user->id);
        return redirect('/admin/user')->with('success', 'Akun Berhasil Dihapus!');
    }

    public function print()
    {
        $user = User::all();
        $pdf = PDF::loadview('print.printUser', ['datas' => $user]);
        return $pdf->download('Laporan-User.pdf');
    }
}
