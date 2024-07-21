<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages Propriétaire</title>
    <link rel="stylesheet" href="{{ asset('style_chat.css') }}">
</head>
<body>
    <div class="container">
        <h2>Messages</h2>
        
        @foreach($messagesGroupedByClient as $clientId => $messages)
            <div class="client-messages">
                <h3>Messages de {{ $messages->first()->client->nom }}</h3>
                
                @foreach($messages as $message)
                    <div class="talk {{ $message->id_cl == $clientId ? 'right' : 'left' }}">
                        @if(auth('proprietaire')->check())
                            <!-- Afficher la photo du client -->
                            <img src="{{ asset('images/' . $message->client->image) }}" alt="{{ $message->client->nom }}" class="profile-image">
                        @else
                            <!-- Afficher la photo du propriétaire -->
                            <img src="{{ asset('images/' . $message->proprietaire->image) }}" alt="{{ $message->proprietaire->nom }}" class="profile-image">
                        @endif
                        <p>{{ $message->contenu }}</p>
                    </div>
                @endforeach

                <!-- Formulaire de réponse -->
                <form class="chat-form" action="{{ route('proprietaire.sendMessage') }}" method="POST">
                    @csrf
                    <div class="container-inputs-stuffs">
                        <div class="group-inp">
                            <textarea name="contenu" placeholder="Enter your message here" minlength="1" maxlength="1500"></textarea>
                        </div>

                        <input type="hidden" name="id_cl" value="{{ $clientId }}">
                        <input type="hidden" name="id_pro" value="{{ auth('proprietaire')->check() ? auth('proprietaire')->id() : $proprietaire->id }}">

                        <button type="submit" class="submit-msg-btn">
                            <img src="{{ asset('img/send.svg') }}">
                        </button>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
