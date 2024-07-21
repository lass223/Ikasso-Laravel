<!-- resources/views/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link rel="stylesheet" href="{{ asset('style3.css') }}">
</head>
<body>
    <div class="container">
        <h2>Creer un Proprietaire</h2>
        <form action="{{ route('proprietaire.storeAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
                @error('nom')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
                @error('prenom')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" required>
                @error('adresse')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="birthdate">Date de Naissance</label>
                <input type="date" id="birthdate" name="birthdate" max="2004-01-01" required>
                @error('birthdate')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" required>
                @error('telephone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" required>
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <input type="text" id="statut" name="statut" required>
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

            <button type="submit" class="btn">Ajouter</button>
            <button onclick="history.back()" class="btn-retour">Retour</button>
        </form>
    </div>
</body>
</html>
