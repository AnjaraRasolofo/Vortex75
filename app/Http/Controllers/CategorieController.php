<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::where('id',$id)->firstOrFail();
        $articles = $categorie->actualites()->latest()->get();
        $tutos = $categorie->ressources()->latest()->get();
        return view('fronts.categorie', compact('articles','tutos'));
    }
}
