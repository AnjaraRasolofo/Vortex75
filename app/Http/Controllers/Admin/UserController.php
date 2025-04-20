<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user) {
        $roles = [
            'user' => 'Utilisateur',
            'admin' => 'Administrateur'
        ];

        return view('admin.users.edit', compact('user','roles'));
    } 

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', "Rôle de {$user->name} mis à jour en « {$request->role} ».");
    }
}

