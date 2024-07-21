@extends('base3')
@section('content')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">{{ $bien->title }}</h1>
                    <span class="color-text-a">{{ $bien->adresse }}</span>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('property-grid') }}">Properties</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $bien->title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
  <div class="container">
  <div class="col-sm-12">
    <div class="propertys-container">
        <div class="slider">
            @foreach($images as $image)
                <div class="slider-item">
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Image de {{ $bien->title }}">
                </div>
            @endforeach
        </div>
        <button class="slider-control prev">&lt;</button>
        <button class="slider-control next">&gt;</button>
    </div>
</div>

<script src="{{ asset('slider.js') }}"></script>
          <div class="row justify-content-between">
                    <div class="col-md-5 col-lg-4">
                        <div class="property-price d-flex justify-content-center foo">
                            <div class="card-header-c d-flex">
                                <div class="card-box-ico">
                                    <span class="ion-money">FCFA</span>
                                </div>
                                <div class="card-title-c align-self-center">
                                    <h5 class="title-c">{{ $bien->prix }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="property-summary">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d section-t4">
                                        <h3 class="title-d">Informations</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-list">
                                <ul class="list">
                                    <li class="d-flex justify-content-between">
                                        <strong>Localisation:</strong>
                                        <span>{{ $bien->adresse }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Type de propriétés:</strong>
                                        <span>{{ $bien->type }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Statut:</strong>
                                        <span> En {{ $bien->statut }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Superficie:</strong>
                                        <span>{{ $bien->surface }} m<sup>2</sup></span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Chambres:</strong>
                                        <span>{{ $bien->chambre }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Pièces:</strong>
                                        <span>{{ $bien->piece }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Etage:</strong>
                                        <span>{{ $bien->etage }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
      
              <div class="col-md-7 col-lg-7 section-md-t3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <h3 class="title-d"> Description de la propriété</h3>
                                </div>
                            </div>
                        </div>
                        <div class="property-description">
                            <p class="description color-text-a">{{ $bien->description }}</p>
                        </div>                        
                    </div>
                </div>

        <div class="col-md-12">
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Propriétaire</h3>
              </div>
            </div>
          </div>
          <div class="row">
    <div class="col-md-6 col-lg-4">
        <img src="{{ asset('images/' . $proprietaire->image) }}" alt="{{ $proprietaire->nom }}" class="img-fluid">
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="property-agent">
            <h4 class="title-agent">{{ $proprietaire->nom }}</h4>
            <p class="color-text-a">{{ $proprietaire->description }}</p>
            <ul class="list-unstyled">
                <li class="d-flex justify-content-between">
                    <strong>Phone:</strong>
                    <span class="color-text-a">{{ $proprietaire->telephone }}</span>
                </li>
                <li class="d-flex justify-content-between">
                    <strong>Email:</strong>
                    <span class="color-text-a">{{ $proprietaire->email }}</span>
                </li>
            </ul>
            <div class="socials-a">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="{{ $proprietaire->facebook }}">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ $proprietaire->twitter }}">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ $proprietaire->instagram }}">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_pro" value="{{ $proprietaire->id }}">
            <div class="form-group">
                <label for="contenu">Message</label>
                <textarea name="contenu" id="contenu" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-a">Contacter</button>
        </form>
    </div>
</div>
    </div>
  </section>
  <!--/ Property Single End /-->

@endsection
