<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="{{ asset('style3.css') }}">
</head>
<body>
    <div class="container">
        <h2>Modifier les informations du Proprietaire</h2>
        <form action="{{ route('proprietaire.updateAdmin', $proprietaire->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Assurez-vous d'utiliser PUT pour une mise à jour -->
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ $proprietaire->nom }}" required>
                @error('nom')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{ $proprietaire->prenom }}" required>
                @error('prenom')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $proprietaire->email }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ $proprietaire->password }}" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" value="{{ $proprietaire->adresse }}" required>
                @error('adresse')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="birthdate">Date de Naissance</label>
                <input type="date" id="birthdate" name="birthdate" value="{{ $proprietaire->birthdate }}" max="2004-01-01" required>
                @error('birthdate')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" value="{{ $proprietaire->telephone }}" required>
                @error('telephone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
                @if($proprietaire->image)
                    <img src="{{ asset('storage/' . $proprietaire->image) }}" alt="Proprietaire Image" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <input type="text" id="statut" name="statut" value="{{ $proprietaire->statut }}" required>
                @error('statut')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
    <label for="id_abonnement">ID Abonnement</label>
    <select id="id_abonnement" name="id_abonnement">
        <option value="" >-- Choisissez un abonnement --</option>
        @foreach($abonnements as $abonnement)
            <option value="{{ $abonnement->id }}">{{ $abonnement->type }}</option>
        @endforeach
    </select>
    @error('id_abonnement')
        <div class="error">{{ $message }}</div>
    @enderror
</div>
            <button type="submit" class="btn">Modifier</button>
            <button onclick="history.back()" class="btn-retour">Retour</button>
        </form>
    </div>
</body>
</html>
