<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Répondre à un message</title>
    <link rel="stylesheet" href="{{ asset('style_chat1.css') }}">
</head>
<body>
    <div class="container">
    <a href="{{ route('messages.index') }}" class="btn btn-secondary">Retour</a>
        <h2>Répondre à un message</h2>
        <p>Message de: {{ $message->client->nom }} {{ $message->client->prenom }}</p>
        <p>{!! nl2br(e($message->contenu)) !!}</p>
        <form action="{{ route('messages.reply', $message->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="contenu">Votre réponse</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        

    </div>
</body>
</html>
