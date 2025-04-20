<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actualite;
use App\Models\Ressource;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function actualites() // ou tutorials, selon ton nom
    {
        return $this->hasMany(Actualite::class);
    }

    public function ressources() // ou tutorials, selon ton nom
    {
        return $this->hasMany(Ressource::class);
    }
}
