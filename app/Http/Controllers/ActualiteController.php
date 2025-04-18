<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::where('status','publie')->latest()->paginate(10);
        return view('fronts.actualites', compact('actualites'));
    }

    public function show($slug) 
    {
        $actualite = Actualite::where('slug', $slug)->firstOrFail();
        return view('fronts.actualite', compact('actualite'));
    }
}
