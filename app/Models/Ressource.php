<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'slug',
        'contenu',
        'image',
        'categorie_id',
        'user_id',
        'date_publication',
        'status',
    ];

    // Relation : Une actualité appartient à une catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Relation : Une actualité est écrite par un utilisateur (auteur)
    public function auteur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scope : actualités publiées et dont la date est atteinte
    public function scopePublie($query)
    {
        return $query->where('status', 'publie')
                     ->whereDate('date_publication', '<=', now());
    }
}
