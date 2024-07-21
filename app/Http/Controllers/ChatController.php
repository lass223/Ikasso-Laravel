<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Proprietaire;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $client = Auth::guard('client')->user(); // Récupérer le client authentifié
        $proprietaire = Auth::guard('proprietaire')->user(); // Récupérer le propriétaire authentifié
    
        return view('chat.index', [
            'client' => $client,
            'proprietaire' => $proprietaire,
        ]);
    }

    public function fetchMessages()
    {
        $user = Auth::user();

        if ($user instanceof Client) {
            $messages = Message::where('id_cl', $user->id)->orWhere('id_pro', $user->id_pro)->get();
        } elseif ($user instanceof Proprietaire) {
            $messages = Message::where('id_pro', $user->id)->orWhere('id_cl', $user->id_cl)->get();
        }

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
    
        $message = new Message();
        $message->contenu = $request->contenu;
        $message->date = now();
    
        if ($user instanceof Client) {
            $message->id_cl = $user->id;
            $message->id_pro = $request->id_pro;
        } elseif ($user instanceof Proprietaire) {
            $message->id_pro = $user->id;
            $message->id_cl = $request->id_cl;
        }
    
        $message->save();
    
        return response()->json($message);
    }
    
}
