<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $fillable = [
        'contenu', 
        'id_cl', 
        'id_pro',
        'sender_type',
        'receiver_type',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cl');
    }

    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class, 'id_pro');
    }
}