<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ressource;

class RessourceController extends Controller
{
    public function index()
    {
        $ressources = Ressource::where('status','publie')->latest()->paginate(10);
        return view('fronts.ressources', compact('ressources'));
    }

    public function show($slug) 
    {
        $tuto = Ressource::where('slug', $slug)->firstOrFail();
        return view('fronts.ressource', compact('tuto'));
    }
}
