<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $adminId = User::where('role', 'admin')->first()->id;
        return view('home', compact('adminId'));

    }
}
