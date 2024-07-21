<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Proprietaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Afficher le formulaire pour envoyer un nouveau message
    public function create($proprietaireId)
    {
        // Récupérer le propriétaire par son ID
        $proprietaire = Proprietaire::findOrFail($proprietaireId);
    
        // Passer $proprietaire à la vue 'messages.create'
        return view('messages.create', compact('proprietaire'));
    }
    
    // Enregistrer un nouveau message envoyé par un client
    public function store(Request $request)
    {
        $request->validate([
            'contenu' => 'required|string',
            'id_pro' => 'required|exists:proprietaires,id',
        ]);

        $message = new Message([
            'contenu' => $request->contenu,
            'id_cl' => Auth::user()->id, // ID du client actuellement connecté
            'id_pro' => $request->id_pro,
            'sender_type' => 'client',
            'receiver_type' => 'proprietaire',
        ]);
        $message->save();

        return redirect()->back()->with('success', 'Message envoyé avec succès !');
    }

    // Afficher les messages reçus par le propriétaire (propriétaire connecté)
    public function index()
    {
        $messages = Message::where('id_pro', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $id_pro = Auth::user()->id; // Récupère l'ID du propriétaire actuellement authentifié
        return view('messages.index', compact('messages', 'id_pro'));
    }
    // Afficher le formulaire pour répondre à un message
    public function replyForm($messageId)
    {
        $message = Message::findOrFail($messageId);
        return view('messages.reply', compact('message'));
    }

    // Enregistrer la réponse du propriétaire à un message
    public function reply(Request $request, $messageId)
    {
        $request->validate([
            'contenu' => 'required|string',
        ]);

        $message = Message::findOrFail($messageId);
        $message->contenu .= "\n\nRéponse de " . Auth::user()->nom . ": " . $request->contenu;
        $message->save();

        return redirect()->back()->with('success', 'Réponse envoyée avec succès !');
    }
    

// MessageController.php

public function clientIndex()
{
    // Récupérer tous les messages envoyés par le client et les réponses reçues
    $clientMessages = Message::with('proprietaire')
        ->where('id_cl', Auth::id())
        ->orWhere(function ($query) {
            $query->where('id_pro', Auth::id())
                  ->where('sender_type', 'proprietaire');
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('messages.client_index', compact('clientMessages'));
}


    public function clientReplyForm($messageId)
    {
        $message = Message::findOrFail($messageId);
        return view('messages.clientReply', compact('message'));
    }

    // Enregistrer la réponse du client à un message
    public function clientReply(Request $request, $messageId)
    {
        $request->validate([
            'contenu' => 'required|string',
        ]);
    
        $message = Message::findOrFail($messageId);
        $message->contenu_reponse = $request->contenu;
        $message->save();
    
        return redirect()->route('client.messages.index')->with('success', 'Réponse envoyée avec succès !');
    }
}

