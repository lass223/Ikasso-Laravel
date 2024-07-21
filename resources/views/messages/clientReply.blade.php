<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Répondre au message</title>
</head>
<body>
    <div class="container">
    <a href="{{ route('client.messages.index') }}" class="btn btn-secondary">Retour</a>
        <h2>Répondre au message</h2>
        <form action="{{ route('client.messages.reply', $message->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="contenu">Contenu de la réponse</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer la réponse</button>
        </form>
    </div>
</body>
</html>
