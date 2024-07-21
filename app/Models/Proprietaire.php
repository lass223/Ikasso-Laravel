<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Proprietaire extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'adresse',
        'birthdate',
        'telephone',
        'image',
        'statut',
        'id_abonnement',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

     public function abonnement()
     {
         return $this->belongsTo(Abonnement::class, 'id_abonnement');
     }

    public function bienVentes()
    {
        return $this->hasMany(BienVente::class, 'id_pro');
    }

    public function bienLocations()
    {
        return $this->hasMany(BienLocation::class, 'id_pro');
    }
    
     public function messages()
     {
       return $this->hasMany(Message::class, 'id_pro');
    }
}
