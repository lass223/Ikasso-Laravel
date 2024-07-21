<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un message</title>
    <link rel="stylesheet" href="{{ asset('style_chat1.css') }}">
</head>
<body>
    <div class="container">
        <h2>Envoyer un message au propriétaire</h2>
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="contenu">Contenu du message</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3"></textarea>
            </div>
            <input type="hidden" name="id_pro" value="{{ $proprietaire->id }}">
            <button type="submit" class="btn btn-primary">Envoyer</button>
            
        </form>
        <a href="{{ route('client.messages.index') }}" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>
