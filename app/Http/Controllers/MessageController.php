<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Message::create($validatedData);

        return redirect('/contact')->with('success', 'Pesan Berhasil Dikirimkan!');
    }

}
