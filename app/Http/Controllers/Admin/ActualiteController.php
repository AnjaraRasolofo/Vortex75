<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Actualite;
use App\Models\Categorie;
use App\Models\User;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actualites = Actualite::latest()->paginate(10);
        return view('admin.actualites.index', compact('actualites'));
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
        return view('admin.actualites.create', compact('categories','users'));
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

        $actualite = new Actualite();
        $actualite->titre = $request->titre;
        $actualite->slug = Str::slug($request->titre); // <- ici on génère le slug automatiquement
        $actualite->contenu = $request->contenu;
        $actualite->categorie_id = $request->categorie_id;
        $actualite->user_id = auth()->id();
        $actualite->date_publication = $request->date_publication;
        $actualite->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/actualites'), $filename);
            $actualite->image = $filename;
        }

        $actualite->save();

        return redirect()->route('admin.actualites.index')->with('success','Article crée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actualite = Actualite::where('id', $id)->firstOrFail();
        return view('admin.actualites.show', compact('actualite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actualite = Actualite::where('id',$id)->firstOrFail();
        $categories = Categorie::all();
        $users = User::all();
        return view('admin.actualites.edit', compact('actualite', 'categories', 'users'));
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
        $actualite = Actualite::findOrFail($id);

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
            if ($actualite->image) {
                Storage::disk('public')->delete($actualite->image);
            }
            $actualite->image = $request->file('image')->store('actualites', 'public');
        }

        $actualite->update([
            'titre' => $request->titre,
            'slug' => Str::slug($request->titre),
            'contenu' => $request->contenu,
            'categorie_id' => $request->categorie_id,
            'user_id' => $request->user_id,
            'date_publication' => $request->date_publication,
            'status' => $request->status,
        ]);

        // \Log::info('DATA:', $request->all());

        return back()->with('success', 'Article mis à jour !');

        //return response()->json(['message' => 'Mise à jour réussie']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($actualite)
    {
        if ($actualite->image) {
            Storage::disk('public')->delete($actualite->image);
        }

        $actualite->delete();

        return redirect()->route('admin.actualites.index')->with('success', 'Article supprimé.');
    }
}
