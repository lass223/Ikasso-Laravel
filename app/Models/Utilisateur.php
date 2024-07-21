<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
