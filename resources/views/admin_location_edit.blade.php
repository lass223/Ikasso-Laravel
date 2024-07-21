<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Bien en Location</title>
    <link rel="stylesheet" href="{{ asset('style3.css') }}">
</head>
<body>
    <div class="container" >
        <h2>Modifier un Bien en Location</h2>
        <form action="{{ route('bienlocation.updateAdmin', $bienlocation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" value="{{ old('title', $bienlocation->title) }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" value="{{ old('type', $bienlocation->type) }}" required>
                @error('type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required>{{ old('description', $bienlocation->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="surface">Surface</label>
                <input type="number" id="surface" name="surface" value="{{ old('surface', $bienlocation->surface) }}" required>
                @error('surface')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="piece">Pièces</label>
                <input type="number" id="piece" name="piece" value="{{ old('piece', $bienlocation->piece) }}" required>
                @error('piece')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="chambre">Chambres</label>
                <input type="number" id="chambre" name="chambre" value="{{ old('chambre', $bienlocation->chambre) }}" required>
                @error('chambre')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="etage">Étage</label>
                <input type="number" id="etage" name="etage" value="{{ old('etage', $bienlocation->etage) }}" required>
                @error('etage')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="loyer">Loyer</label>
                <input type="number" id="loyer" name="loyer" value="{{ old('loyer', $bienlocation->loyer) }}" required>
                @error('loyer')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" value="{{ old('ville', $bienlocation->ville) }}" required>
                @error('ville')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $bienlocation->adresse) }}" required>
                @error('adresse')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_pro">Propriétaire</label>
                <select id="id_pro" name="id_pro" required>
                    @foreach($proprietaires as $proprietaire)
                        <option value="{{ $proprietaire->id }}" {{ $bienlocation->id_pro == $proprietaire->id ? 'selected' : '' }}>{{ $proprietaire->nom }}</option>
                    @endforeach
                </select>
                @error('id_pro')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" id="images" name="images[]" multiple>
                @error('images')
                    <div class="error">{{ $message }}</div>
                @enderror
                @error('images.*')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Modifier</button>
            <button onclick="history.back()" class="btn-retour">Retour</button>
        </form>
    </div>
</body>
</html>
