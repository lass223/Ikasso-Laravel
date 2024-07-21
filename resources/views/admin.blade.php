<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agence Immobilière Dashboard</title>
    <link rel="stylesheet" href="{{ asset('style2.css') }}">
</head>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sliders = document.querySelectorAll('.image-slider');
        sliders.forEach(slider => {
            let index = 0;
            const images = slider.querySelectorAll('img');
            images[index].style.display = 'block';

            setInterval(() => {
                images[index].style.display = 'none';
                index = (index + 1) % images.length;
                images[index].style.display = 'block';
            }, 3000);
        });
    });
</script>
<body>

<div class="sidebar">
     <!-- Bouton de déconnexion -->
     <form action="{{ route('logout')}}" method="POST" style="margin-bottom: 20px;">
        @csrf
        <button type="submit" class="btn btn-logout">Déconnexion</button>
    </form>
    <h2>Tableau de bord</h2>
    <ul>
        <li><a href="#clients" class="nav-link"><i class="fas fa-user"></i> Clients</a></li>
        <li><a href="#proprio" class="nav-link"><i class="fas fa-user"></i> Propriétaires</a></li>
        <li><a href="#properties_vente" class="nav-link"><i class="fas fa-home"></i>Biens Ventes</a></li>
        <li><a href="#properties_loca" class="nav-link"><i class="fas fa-home"></i>Biens Locations</a></li>
        <li><a href="#abonnement" class="nav-link"><i class="fas fa-user"></i> Abonnements</a></li>
    </ul>
</div>

<div class="content">
   
    
    <section id="clients" class="tab-content active">
        <h2>Liste des clients</h2>
        <a class="btn btn-add" href="{{ route('client.createAdmin') }}">Nouveau Client</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th>
 
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Photo</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->email }}</td>
       
                    <td>{{ $client->adresse }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td><img src="{{ asset('images/' . $client->image) }}" width="96" height="100" /></td>
                    <td>
                        <a class="btn btn-edit" href="{{ route('client.editAdmin', $client->id) }}">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('client.destroyAdmin', $client->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section id="proprio" class="tab-content">
        <h2>Liste des propriétaires</h2>
        <a class="btn btn-add" href="{{ route('proprietaire.createAdmin') }}">Nouveau propriétaire</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Photo</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proprietaires as $proprietaire)
                <tr>
                    <td>{{ $proprietaire->nom }}</td>
                    <td>{{ $proprietaire->prenom }}</td>
                    <td>{{ $proprietaire->email }}</td>
                    <td>{{ $proprietaire->adresse }}</td>
                    <td>{{ $proprietaire->telephone }}</td>
                    <td><img src="{{ asset('images/' . $proprietaire->image) }}" width="96" height="100" /></td>
                    <td>
                        <a class="btn btn-edit" href="{{ route('proprietaire.editAdmin', $proprietaire->id) }}">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('proprietaire.destroyAdmin', $proprietaire->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section id="properties_loca" class="tab-content">
        <h2>Liste des Biens mis en Location</h2>
        <a class="btn btn-add" href="{{ route('bienlocation.createAdmin') }}">Ajouter un Bien en location</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                  
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Loyer</th>
                    <th>propriétaire</th>
                    <th>Images</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bien_locations as $bien_location)
                <tr>
                    
                    <td>{{ $bien_location->title }}</td>
                    <td>{{ $bien_location->type }}</td>
                    <td>{{ $bien_location->ville }}</td>
                    <td>{{ $bien_location->adresse }}</td>
                    <td>{{ $bien_location->loyer }}</td>
                    <td>{{ $bien_location->proprietaire->nom }} {{ $bien_location->proprietaire->prenom }}</td>
<td>
                        <div class="property-images image-slider">
                @foreach($bien_location->images as $image)
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $bien_location->title }}" style="display:none;" width="96" height="100"> 
                 @endforeach
                    </div>
                    </td>
                    <td>
                        <a class="btn btn-edit" href="{{ route('bienlocation.editAdmin', $bien_location->id) }}">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('bienlocation.destroyAdmin', $bien_location->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section id="properties_vente" class="tab-content">
        <h2>Liste des Biens mis en Vente</h2>
        <a class="btn btn-add" href="{{ route('bienvente.createAdmin') }}">Ajouter un Bien en vente</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                    
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Prix</th>
                    <th>Propriétaire</th>
                    <th>Images</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bien_ventes as $bien_vente)
                <tr>
                   
                    <td>{{ $bien_vente->title }}</td>
                    <td>{{ $bien_vente->type }}</td>
                    <td>{{ $bien_vente->ville }}</td>
                    <td>{{ $bien_vente->adresse }}</td>
                    <td>{{ $bien_vente->prix }}</td>
                    <td>{{ $bien_vente->proprietaire->nom }} {{ $bien_vente->proprietaire->prenom }}</td>
                    <td>
                    <div class="property-images image-slider">
                @foreach($bien_vente->images as $image)
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $bien_vente->title }}" style="display:none;" width="96" height="100"> 
                 @endforeach
                    </div>
                    </td>
                    <td>
                        <a class="btn btn-edit" href="{{ route('bienvente.editAdmin', $bien_vente->id) }}">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('bienvente.destroyAdmin', $bien_vente->id) }}" method="POST" onsubmit="return confirmDelete()" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section id="abonnement" class="tab-content">
        <h2>Liste des abonnements</h2>
        <a class="btn btn-add" href="{{ route('abonnements.create') }}">Nouvel abonnement</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Prix</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($abonnements as $abonnement)
                <tr>
                    <td>{{ $abonnement->id }}</td>
                    <td>{{ $abonnement->type }}</td>
                    <td>{{ $abonnement->prix }}</td>
                    <td>
                        <a class="btn btn-edit" href="{{ route('abonnements.edit', $abonnement->id) }}">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('abonnements.destroy', $abonnement->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>


<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer ?");
    }
</script>

<script src="script.js"></script>
</body>
</html>
