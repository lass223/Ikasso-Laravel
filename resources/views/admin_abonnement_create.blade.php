<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Abonnement</title>
    <link rel="stylesheet" href="{{ asset('style3.css') }}">
</head>
<body>
    <div class="container">
        <h2>Créer un Abonnement</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('abonnements.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" id="prix" name="prix" required step="0.01">
            </div>
            <button type="submit" class="btn">Créer</button>
            <button onclick="history.back()" class="btn-retour">Retour</button>
        </form>
       
    </div>
</body>
    </div>

    <script src="script.js"></script>
</body>
</html>
