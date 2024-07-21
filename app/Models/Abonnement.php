<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;
    protected $fillable = [

         'type', 
         'prix',
         
    ];

    public function proprietaires()
    {
        return $this->hasMany(Proprietaire::class, 'id_abonnement');
    }
}
