@extends('base2')
@section('content')

<!-- Custom JS for Slider -->
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

<a class="btn btn-a" href="{{ route('agree', ['id_pro' => $id_pro]) }}"  style="margin-top: 200px">Ajouter un bien</a>

<section id="properties_loca" class="tab-content">

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        @endif
    </div>  

    <h3>Liste des Biens mis en Location</h3>
    <div class="card-container">
        @foreach($bien_locations as $bien_location)
        <div class="property-card">
            <div class="property-images image-slider">
                @foreach($bien_location->images as $image)
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $bien_location->title }}" style="display:none;"> 
                 @endforeach
            </div>
            <div class="property-details">
                <ul>
                   
                    <li><strong>Titre:</strong> {{ $bien_location->title }}</li>
                    <li><strong>Type:</strong> {{ $bien_location->type }}</li>
                    <li><strong>Ville:</strong> {{ $bien_location->ville }}</li>
                    <li><strong>Quartier:</strong> {{ $bien_location->adresse }}</li>
                    <li><strong>Surface:</strong> {{ $bien_location->surface }} m²</li>
                    <li><strong>Loyer:</strong> {{ $bien_location->loyer }} FCFA</li>
                </ul>
                <div class="property-actions">
    <a class="btn btn-edit" href="{{ route('bien_locations.edit', ['id_pro' => $id_pro, 'id' => $bien_location->id]) }}">Modifier</a>
    <form action="{{ route('bien_locations.destroy', ['id_pro' => $id_pro, 'id' => $bien_location->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-delete">Supprimer</button>
</form>


</div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section id="properties_vente" class="tab-content" style="margin-bottom: 150px">
    <h3>Liste des Biens mis en Vente</h3>
    <div class="card-container">
        @foreach($bien_ventes as $bien_vente)
        <div class="property-card">
            <div class="property-images image-slider">
                @foreach($bien_vente->images as $image)
              
                <img src="{{ asset('storage/' . $image->path) }}"  alt="{{ $bien_vente->title }}" style="display:none;">
                @endforeach
            </div>
            <div class="property-details">
                <ul>
                   
                    <li><strong>Titre:</strong> {{ $bien_vente->title }}</li>
                    <li><strong>Type:</strong> {{ $bien_vente->type }}</li>
                    <li><strong>Ville:</strong> {{ $bien_vente->ville }}</li>
                    <li><strong>Adresse:</strong> {{ $bien_vente->adresse }}</li>
                    <li><strong>Surface:</strong> {{ $bien_vente->surface }} m²</li>
                    <li><strong>Prix:</strong> {{ $bien_vente->prix }} FCFA</li>
                </ul>
                <div class="property-actions">
                <a class="btn btn-edit" href="{{ route('bien_ventes.edit', ['id_pro' => $id_pro, 'id' => $bien_vente->id]) }}">Modifier</a>
                    <form action="{{ route('bien_ventes.destroy', ['id_pro' => $id_pro, 'id' => $bien_vente->id]) }}" method="POST" style="display:inline-block;"  onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer ce bien ?");
    }
</script>

<style>
    /* General Styling */
    h3 {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 50px;
    }

    .btn {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        color: white;
    }

    .btn-edit {
        background-color: #45a049;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 10px;
        border-radius: 2px;
        margin-bottom: 20px;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .property-card {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .property-images {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .property-images img {
        width: 100%;
        height: auto;
    }

    .property-details {
        padding: 15px;
    }

    .property-details ul {
        list-style-type: none;
        padding: 0;
        margin: 0 0 15px 0;
    }

    .property-details ul li {
        margin-bottom: 10px;
    }

    .property-actions {
        display: flex;
        justify-content: space-between;
    }

    @media (max-width: 768px) {
        .property-card {
            width: 100%;
        }
    }
</style>

@endsection
