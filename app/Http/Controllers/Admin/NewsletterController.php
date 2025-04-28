<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(10);
        return view('admin.newsletters.index', compact('newsletters'));
    }
}
