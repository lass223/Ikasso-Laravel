<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes messages</title>
    <link rel="stylesheet" href="{{ asset('style_chat.css') }}">
</head>
<body>
    <div class="container">
        <a href="{{route('proprietaire.showBien', ['id_pro' => $id_pro]) }}" class="btn btn-secondary">Retour</a>
        
        <h2>Mes messages</h2>
        <ul>
            @foreach ($messages as $message)
                <li>
                    <strong>De:</strong> {{ $message->client->nom }} {{ $message->client->prenom }}
                    <p>{!! nl2br(e($message->contenu)) !!}</p>
                    <a href="{{ route('messages.replyForm', $message->id) }}" class="btn btn-primary">Répondre</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
