@extends('base2')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif

<form method="POST" class="form-a contactForm" action="{{ route('bien_ventes.store', ['id_pro' => $id_pro]) }}" enctype="multipart/form-data" style="margin-top: 200px; width: 85%; align-items: center">
    @csrf

    <input type="hidden" name="id_pro" value="{{ $id_pro }}">

    <!-- Rest of the form fields -->


    @if (Auth::guard('proprietaire')->check())
    <p>Utilisateur authentifié en tant que propriétaire.</p>
@else
    <p>Utilisateur non authentifié en tant que propriétaire.</p>
@endif

    <div class="row">
        <!-- Première colonne -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control form-control-lg form-control-a" name="title" id="title" placeholder="Entrez un titre"/>
                        @error('title')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-select" name="type" id="type" class="form-control form-control-lg form-control-a">
                            <option selected value="Villa">Villa</option>
                            <option value="Hôtel">Hôtel</option>
                            <option value="Résidence">Résidence</option>
                            <option value="Appartement">Appartement</option>
                            <option value="Box de stockage">Box de Stockage</option>
                            <option value="Célibatorium">Célibatorium</option>
                            <option value="Logements sociaux">Logements sociaux</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Deuxième colonne -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="surface">Surface</label>
                        <input type="number" class="form-control" name="surface" id="surface" class="form-control form-control-lg form-control-a" placeholder="Entrez la surface"/>
                        @error('surface')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="piece">Nombre de pièces</label>
                        <input type="number" class="form-control" name="piece" id="piece" class="form-control form-control-lg form-control-a" placeholder="Entrez le nombre de pièces"/>
                        @error('piece')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="chambre">Nombre de Chambres</label>
                        <input type="number" class="form-control" name="chambre" id="chambre" class="form-control form-control-lg form-control-a" placeholder="Entrez le nombre de chambres"/>
                        @error('chambre')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="etage">Nombre d'étages</label>
                        <input type="number" class="form-control" name="etage" id="etage" class="form-control form-control-lg form-control-a" placeholder="Entrez le nombre d'étage"/>
                        @error('etage')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" class="form-control" name="prix" id="prix" class="form-control form-control-lg form-control-a" placeholder="Entrez votre nom"/>
                        @error('prix')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" name="ville" id="ville" class="form-control form-control-lg form-control-a" placeholder="Dans quelle ville se trouve votre bien?"/>
                @error('ville')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="adresse">Quartier</label>
                <input type="text" class="form-control" name="adresse" id="adresse" class="form-control form-control-lg form-control-a" placeholder="Donnez l'adresse du bien" />
                @error('adresse')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control" name="images[]" multiple id="images" class="form-control form-control-lg form-control-a">
                @error('images')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-a">Enregistrer</button>
    <button type="reset" class="btn btn-a">Réinitialiser</button>
</form>

@endsection
