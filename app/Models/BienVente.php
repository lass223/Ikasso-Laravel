<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BienVente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'type',
        'description',
        'surface',
        'piece',
        'chambre',
        'etage',
        'prix',
        'ville',
        'adresse',
        'id_pro',  // Ajout de id_pro ici
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'bien_vente_id');
    }

    public function firstImage()
    {
        return $this->hasOne(Image::class, 'bien_vente_id')->orderBy('created_at');
    }

    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class, 'id_pro');
    }
}