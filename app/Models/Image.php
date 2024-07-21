<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['bien_location_id', 'bien_vente_id', 'path'];

    public function bienLocation()
    {
        return $this->belongsTo(BienLocation::class, 'bien_location_id');
    }

    public function bienVente()
    {
        return $this->belongsTo(BienVente::class, 'bien_vente_id');
    }
}
