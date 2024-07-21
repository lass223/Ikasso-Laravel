@extends('base')
@section('content')

<form class="form-a contactForm" method="POST" action="{{ route('utilisateurs.store')}}" enctype="multipart/form-data" style="margin-top: 200px; width: 85%; align-items: center">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control form-control-lg form-control-a" placeholder="Entrez votre nom" value="{{ old('nom') }}" required>
                @error('nom')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control form-control-lg form-control-a" placeholder="Entrez votre prénom" value="{{ old('prenom') }}" required>
                @error('prenom')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg form-control-a" placeholder="Entrez votre adresse Email" value="{{ old('email') }}" required>
                @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg form-control-a" placeholder="Entrez votre Mot de passe" required>
                @error('password')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control form-control-lg form-control-a" placeholder="Lieu de résidence - rue - porte" value="{{ old('adresse') }}" required>
                @error('adresse')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="birthdate">Date de naissance</label>
                <input type="date" name="birthdate" id="birthdate" class="form-control form-control-lg form-control-a" placeholder="Date de naissance" value="{{ old('birthdate') }}" max="2004-01-01" required>
                @error('birthdate')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control form-control-lg form-control-a" placeholder="Téléphone" value="{{ old('telephone') }}" required>
                @error('telephone')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="photo">Photo de profil</label>
                <input type="file" name="image" id="photo" class="form-control form-control-lg form-control-a" placeholder="Photo de profil" required>
                @error('image')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <h2>Statut</h2><br>
                <label><input type="radio" class="form-control" name="statut" value="client" {{ old('statut') == 'client' ? 'checked' : '' }} required /> Client</label><br>
                <label><input type="radio" class="form-control" name="statut" value="partenaire" {{ old('statut') == 'partenaire' ? 'checked' : '' }} required /> Propriétaire</label><br>
                @error('statut')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div id="abonnement-section" class="col-md-12 mb-3" style="display: none;">
            <div class="form-group">
                <label for="abonnement">Abonnement</label>
                <select name="id_abonnement" id="abonnement" class="form-control form-control-lg form-control-a" require >
                    <option value="">Sélectionnez un abonnement</option>
                    @foreach($abonnements as $abonnement)
                        <option value="{{ $abonnement->id }}">{{ $abonnement->type }} {{ $abonnement->prix }} FCFA</option>
                    @endforeach
                </select>
                @error('id_abonnement')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12 mb-3 text-center">
            <button type="submit" class="btn btn-a">Soumettre</button>
            <button type="reset" class="btn btn-a">Réinitialiser</button>
        </div>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statutInputs = document.querySelectorAll('input[name="statut"]');
        const abonnementSection = document.getElementById('abonnement-section');

        statutInputs.forEach(input => {
            input.addEventListener('change', function () {
                if (this.value === 'partenaire') {
                    abonnementSection.style.display = 'block';
                } else {
                    abonnementSection.style.display = 'none';
                }
            });
        });

        // Afficher la section abonnement si "partenaire" était sélectionné précédemment
        if (document.querySelector('input[name="statut"]:checked') && document.querySelector('input[name="statut"]:checked').value === 'partenaire') {
            abonnementSection.style.display = 'block';
        }
    });
</script>

@endsection
