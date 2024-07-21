


@extends('base2')
@section('content')

<form method="POST" class="form-a contactForm" action="{{ route('bien_locations.update', ['id_pro' => $id_pro, 'id' => $bien_location->id]) }}" enctype="multipart/form-data" style="margin-top: 150px; width: 85%; align-items: center">
@csrf
@method('POST') 

<div class="row">
    <!-- Première colonne -->
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control form-control-lg form-control-a" name="title" id="title" value="{{ $bien_location->title }}"/>
                    @error('title')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-select" name="type" id="type" class="form-control form-control-lg form-control-a" value="{{ $bien_location->type }}">
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
                    <textarea class="form-control" name="description">{{ $bien_location->description }}</textarea>
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
                    <input type="number" class="form-control" name="surface"id="surface" class="form-control form-control-lg form-control-a" value="{{ $bien_location->surface }}"/>
                    @error('surface')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="piece">Nombre de pièces</label>
                    <input type="number" class="form-control" name="piece" id="piece" class="form-control form-control-lg form-control-a" value="{{ $bien_location->piece }}"/>
                    @error('piece')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="chambre">Nombre de Chambres</label>
                    <input type="number" class="form-control" name="chambre" id="chambre" class="form-control form-control-lg form-control-a" value="{{ $bien_location->chambre }}"/>
                    @error('chambre')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="piece">Nombre d'étages</label>
                    <input type="number" class="form-control" name="etage" id="etage" class="form-control form-control-lg form-control-a" value="{{ $bien_location->etage }}"/>
                    @error('etage')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="prix">Loyer</label>
                    <input type="number" class="form-control" name="loyer" id="loyer" class="form-control form-control-lg form-control-a" value="{{ $bien_location->loyer}}"/>
                    @error('loyer')
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
            <input type="text" class="form-control" name="ville" id= "ville" class="form-control form-control-lg form-control-a" value="{{ $bien_location->ville }}"/>
            @error('ville')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" name="adresse" id="adresse" class="form-control form-control-lg form-control-a" value="{{ $bien_location->adresse }}" />
            @error('adresse')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="images[]" multiple id="image" class="form-control form-control-lg form-control-a" value="{{ $bien_location->image }}">
            @error('image')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<button type="submit" class="btn btn-a">Enregistrer</button>
<button type="reset" class="btn btn-a" >Réinitialiser</button>

</form>

@endsection
