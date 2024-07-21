<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages du client</title>
    <link rel="stylesheet" href="{{ asset('style_chat.css') }}">
</head>
<body>
    <div class="container">
        <a href="{{ route('clie-auth/property-grid3') }}" class="btn btn-secondary">Retour</a>
        <h2>Messages envoyés et réponses</h2>
        <ul class="message-list">
            @foreach ($clientMessages as $message)
                <li class="message-item">
                    <div class="message-content">
                        <p><strong>Contenu du message:</strong></p>
                        <p class="message-text">{!! nl2br(e($message->contenu)) !!}</p>
                        @if ($message->sender_type === 'client')
                            <p><strong>Envoyé à:</strong> {{ $message->proprietaire->nom }}</p>
                        @elseif ($message->receiver_type === 'proprietaire')
                            <p><strong>Reçu de:</strong> {{ $message->proprietaire->nom }}</p>
                        @endif
                    </div>
                    
                   <hr>
                </li>
            @endforeach
        </ul>
        @if ($clientMessages->isEmpty())
            <p>Aucun message trouvé.</p>
        @endif
    </div>
</body>
</html>
