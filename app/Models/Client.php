<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
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
        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bienVentes()
    {
        return $this->hasMany(BienVente::class, 'id_cl');
    }

    public function bienLocations()
    {
        return $this->hasMany(BienLocation::class, 'id_cl');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'id_cl');
    }
}

