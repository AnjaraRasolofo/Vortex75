<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Notifications\NewsletterConfirmation;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request) {
        
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        $newsletter = Newsletter::create([
            'email' => $request->email,
        ]);

        $newsletter->notify(new NewsletterConfirmation());

        return back()->with('success','Merci pour votre inscription à notre newsletter !');
    }
}
