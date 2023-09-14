<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.message.index', [
            'title' => 'Message!',
            'msgs' => message::all()
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
    public function show(Message $contact)
    {
        return view('admin.message.edit', [
            'title' => 'Update Data',
            'data' => $contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $contact)
    {
        return view('admin.message.edit', [
            'title' => 'Detail Message',
            'data' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $contact)
    {
        // dd($message);
        message::destroy($contact->id);
        return redirect('/admin/contact')->with('success', 'Data Berhasil Dihapus!');
    }
}
