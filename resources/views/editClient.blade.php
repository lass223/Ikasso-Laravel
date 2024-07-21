

@extends('base')
@section('content')

<form class="form-a contactForm" method="POST" action="{{ route('clients.update', $client->id)}}" enctype="multipart/form-data" style="margin-top: 150px; width: 85%; align-items: center">
    @csrf
    @method('PUT') 
    <div class="row">

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control form-control-lg form-control-a" value="{{ $client->nom }}">
                @error('nom')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control form-control-lg form-control-a" value="{{ $client->prenom }}">
                @error('prenom')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg form-control-a" value="{{ $client->email }}">
                @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg form-control-a" value="{{ $client->password }}">
                @error('password')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control form-control-lg form-control-a" value="{{ $client->adresse }}">
                @error('adresse')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="birthdate">Date de naissance</label>
                <input type="date" name="birthdate" id="birthdate" class="form-control form-control-lg form-control-a" value="{{ $client->birthdate }}">
                @error('birthdate')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control form-control-lg form-control-a" value="{{ $client->telephone }}">
                @error('telephone')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="photo">Photo de profil</label>
                <input type="file" name="image" id="photo" class="form-control form-control-lg form-control-a" value="{{ $client->image }}">
                @error('image')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-group">
                <h2>Statut</h2><br>
                <label><input type="radio" class="form-control" name="statut" value="client" /> Client</label><br>
                <label><input type="radio" class="form-control" name="statut" value="partenaire" /> Propriétaire</label><br>
                @error('statut')
                <span class="error-message">{{ $message }}</span>
                @enderror

               
            </div>
        </div>
        
              <button type="submit" class="btn btn-a">Soumettre</button>
              <button type="reset" class="btn btn-a">Réinitialiser</button>
   </div>
               
  </form>

@endsection