<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);
    
        /*$slug = Str::slug($request->nom);
    
        // Vérifie si le slug existe déjà, et le modifier si nécessaire
        if (Categorie::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . Str::random(6);  // Ajoute un suffixe unique pour éviter les conflits
        }
    
        Categorie::create([
            'nom' => $request->nom,
            'slug' => $slug,
        ]);*/

        $categorie = new Categorie();
        $categorie->nom = $request->nom;
        $categorie->slug = Str::slug($request->nom); // ← génération du slug
        $categorie->save();
    
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Récupérer la catégorie par son slug
        $categorie = Categorie::where('slug', $slug)->firstOrFail();

        // Récupérer les articles associés à cette catégorie
        $articles = $categorie->articles; // Supposons que tu as une relation entre la catégorie et les articles

        // Passer la catégorie et les articles à la vue
        return view('admin.categories.show', compact('categorie', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::where('id',$id)->firstOrFail();
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);
    
        $categorie = Categorie::findOrFail($id);
        $slug = Str::slug($request->nom);
    
        // Vérifie si le slug existe déjà, et le modifier si nécessaire
        /*if (Categorie::where('slug', $slug)->exists() && $slug !== $categorie->slug) {
            $slug = $slug . '-' . Str::random(6);  // Ajoute un suffixe unique pour éviter les conflits
        }*/
    
        $categorie->update([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom),
        ]);
    
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Categorie supprimé.');
    }
}
