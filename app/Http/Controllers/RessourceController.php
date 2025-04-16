<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function index()
    {
        return view('fronts.ressources');
    }
}
