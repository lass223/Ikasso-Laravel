@extends('base')

@section('content')
  
<!--/ Intro Single start /-->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Résultats de la Recherche</h1>
          <span class="color-text-a">Grille des propriétés</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Résultats de la Recherche
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--/ Intro Single End /-->

<!--/ Property Grid Start /-->
<section class="property-grid grid">
  <div class="container">
    <div class="row">
      @foreach($bien_ventes as $bien_vente)
      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
          @if ($bien_vente->firstImage)
                                <img src="{{ asset('storage/' .$bien_vente->firstImage->path) }}" alt="{{ $bien_vente->title }}" class="img-a img-fluid">
           @endif
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="#">{{ $bien_vente->title }}
                    <br /> {{ $bien_vente->adresse }}</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">{{ $bien_vente->prix }} | Fcfa</span>
                </div>
                <a href="{{ route('login') }}" class="link-a">Plus de détails
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Superficie</h4>
                    <span>{{ $bien_vente->surface }}m<sup>2</sup></span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Chambres</h4>
                    <span>{{ $bien_vente->chambre }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Pièces</h4>
                    <span>{{ $bien_vente->piece }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Étage</h4>
                    <span>{{ $bien_vente->etage }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      @foreach($bien_locations as $bien_location)
      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
          @if ($bien_location->firstImage)
                                <img src="{{ asset('storage/' .$bien_location->firstImage->path) }}" alt="{{ $bien_location->title }}" class="img-a img-fluid">
           @endif
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="#">{{ $bien_location->title }}
                    <br /> {{ $bien_location->adresse }}</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">{{ $bien_location->prix }} Fcfa /JOUR</span>
                </div>
                <a href="{{ route('login') }}" class="link-a">Plus de détails
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Superficie</h4>
                    <span>{{ $bien_location->surface }}m<sup>2</sup></span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Chambres</h4>
                    <span>{{ $bien_location->chambre }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Pièces</h4>
                    <span>{{ $bien_location->piece }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Étages</h4>
                    <span>{{ $bien_location->etage }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="row">
      <div class="col-sm-12">
        <nav class="pagination-a">
          <ul class="pagination justify-content-end">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <span class="ion-ios-arrow-back"></span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item next">
              <a class="page-link" href="#">
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--/ Property Grid End /-->

@endsection
