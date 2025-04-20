<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('fronts.contact');
    }

    public function send(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
    
        Mail::to('ton-email@example.com')->send(new ContactMessage($data));
    
        return back()->with('success', 'Message envoyé avec succès !');
    }
}
