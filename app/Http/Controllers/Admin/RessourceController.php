<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categorie;
use App\Models\Ressource;
use App\Models\User;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ressources = Ressource::latest()->paginate(10);
        return view('admin.ressources.index', compact('ressources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $users = User::all();
        return view('admin.ressources.create', compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'categorie_id' => 'nullable|exists:categories,id',
            'user_id' => 'nullable|exists:users,id',
            'date_publication' => 'nullable|date',
            'status' => 'required|in:brouillon,publie',
            'image' => 'nullable|image|max:2048',
        ]);

        $ressource = new Ressource();
        $ressource->titre = $request->titre;
        $ressource->slug = Str::slug($request->titre); // <- ici on génère le slug automatiquement
        $ressource->contenu = $request->contenu;
        $ressource->categorie_id = $request->categorie_id;
        $ressource->user_id = auth()->id();
        $ressource->date_publication = $request->date_publication;
        $ressource->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/ressources'), $filename);
            $ressource->image = $filename;
        }

        $ressource->save();

        return redirect()->route('admin.ressources.index')->with('success','Article crée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ressource = Ressource::where('id',$id)->firstOrFail();
        $categories = Categorie::all();
        $users = User::all();
        return view('admin.ressources.edit', compact('ressource', 'categories', 'users'));
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
        $ressource = Ressource::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|max:2048',
            'categorie_id' => 'nullable|exists:categories,id',
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|in:brouillon,publie',
            'date_publication' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($ressource->image) {
                Storage::disk('public')->delete($ressource->image);
            }
            $ressource->image = $request->file('image')->store('ressources', 'public');
        }

        $ressource->update([
            'titre' => $request->titre,
            'slug' => Str::slug($request->titre),
            'contenu' => $request->contenu,
            'categorie_id' => $request->categorie_id,
            'user_id' => $request->user_id,
            'date_publication' => $request->date_publication,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.ressources.index')->with('success', 'Article mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ressource)
    {
        if ($ressource->image) {
            Storage::disk('public')->delete($ressource->image);
        }

        $ressource->delete();

        return redirect()->route('admin.ressources.index')->with('success', 'Article supprimé.');
    }
}
