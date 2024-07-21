@extends('base3')
@section('content')

  
  <!--/ Carousel Star /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/slide-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">BAMAKO
                      <br> commune VI</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">204 </span> Faladiè-SEMA 
                      <br> </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="{{ url('property-single.blade.php') }}"><span class="price-a">VOIR LES BIENS </span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/slide-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                  <p class="intro-title-top">BAMAKO
                  <br> commune IV</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">306 </span> Lafiabougou
                      <br> </h1>
                    <p class="intro-subtitle intro-price">
                    <a href="{{ url('property-single.blade.php') }}"><span class="price-a">VOIR LES BIENS </span></a>
                   
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/slide-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">BAMAKO
                      <br> commune V</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">404 </span> Baco-Djicoroni
                      <br> </h1>
                    <p class="intro-subtitle intro-price">
                    <a href="{{ url('property-single.blade.php') }}"><span class="price-a">VOIR LES BIENS </span></a>
                   </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Nos services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-gamepad"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Mise en relation</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              Notre agence joue également un rôle crucial en facilitant la mise
               en relation entre propriétaires et clients. Que vous soyez propriétaire
                cherchant à vendre ou à louer votre bien, ou un client à la recherche de
                 l'endroit parfait, nous sommes là pour vous connecter. Nous assurons une 
                 communication fluide et transparente entre les deux parties, en veillant à
                  ce que toutes les exigences soient satisfaites et que les transactions se
                   déroulent en toute sérénité.
              </p>
            </div>
           
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-usd"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Vente</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              Nous proposons une large gamme de biens immobiliers à la vente,
               allant des appartements modernes en ville aux maisons de campagne pittoresques.
                Notre équipe d'experts vous accompagne tout au long du processus d'achat,
                 depuis la recherche du bien idéal jusqu'à la finalisation de la transaction.
                  Nous nous engageons à vous fournir des conseils personnalisés et à répondre
                   à toutes vos questions pour faire de votre achat une expérience agréable et
                    sans stress.
              </p>
            </div>
           
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Location</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              Que vous soyez à la recherche d'un appartement, d'une maison ou d'un bureau à louer, 
              nous avons ce qu'il vous faut. Notre portefeuille de locations comprend des biens dans
               des quartiers prisés et répondant à divers besoins et budgets. 
               Nous facilitons la recherche de votre location idéale en vous offrant
                des options variées et en organisant des visites à votre convenance.
                 Notre équipe est à votre disposition pour vous aider à chaque étape du processus
                  de location.
              </p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Services End /-->

  <!--/ Property Star /-->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Aperçu sur nos Biens</h2>
            </div>
            
          </div>
        </div>
      </div>
      <div id="property-carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{ url('img/property-6.jpg') }}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{ url('property-single.blade.php') }}">Banakabougou
                      <br /> Rue 600</a>
                  </h2>
                </div>
                <div class="card-body-a">
                 
                  <a href="{{ url('property-grid') }}" class="price-a">Voir d'autres biens
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Superficie</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">chambres</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">pièces</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">étages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{ url('img/property-3.jpg') }}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{ url('property-grid.blade.php') }}">ACI 2000 
                      <br /> Rue de la boulangerie</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  
                  <a href="{{ url('property-grid') }}" class="price-a">Voir d'autres biens
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Superficie</h4>
                      <span>450m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">chambres</h4>
                      <span>3</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">pièces</h4>
                      <span>7</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">étages</h4>
                      <span>0</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/property-7.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{ url('property-grid') }}">Hamdallaye
                      <br /> Rue du savoir 02</a>
                  </h2>
                </div>
                <div class="card-body-a">
                 
                  <a href="{{ url('property-grid') }}"class="price-a">Voir d'autres biens 
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Superficie</h4>
                      <span>650m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">chambres</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">pièces</h4>
                      <span>6</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">étages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/property-10.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{ url('property-single.') }}">Kalaban Koura
                      <br /> Rue Amadou Hampaté BA</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  
                  <a href="{{ url('property-grid') }}" class="price-a">Plus de détails 
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Superficie</h4>
                      <span>650m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">chambres</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">pièces</h4>
                      <span>6</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">étages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Property End /-->

  <!--/ Abonnement Star /-->
  <section class="section-agents section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Abonnements </h2>
            </div>
            <div class="title-link">
              <a href="#">Nos différents abonnements
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="img/maison-argent.jpg" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="{{ url('agent-single.html') }}" class="link-two">Prenium
                      <br> </a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                Cet abonnement vous permet de publier vos biens en ligne pendant 3 mois ; 
                le renouvellement est nécessaire pour maintenir leur visibilité.
                </p>
                <div class="info-agents color-a">
                <p>
                <strong>Prix : </strong> 75 000 FCFA</p>
                  <p>
                    <strong>Plus d'infos : </strong> +223 36 94 52 34</p>
                 
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="img/maison-argent2.jpg" alt="" class="img-d img-fluid" >
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="agent-single.html" class="link-two">Standard
                      <br> </a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                Cet abonnement vous permettra de mettre vos biens en ligne pendant 
                 une periode de 6 mois, une fois le délai écoulé vos biens ne seront 
                 plus visible par les clients, sauf si vous renouvelez l'abonnement. 
                </p>
                <div class="info-agents color-a">
                <p>
                <strong>Prix : </strong> 150 000 FCFA</p>
                  <p>
                    <strong>Plus d'infos : </strong> +223 36 94 52 34</p>
                 
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="img/maison-argent1.jpg" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="agent-single.html" class="link-two">Spécial
                      <br> </a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                Cet abonnement vous permettra de mettre vos biens en ligne pendant 
                 une periode de 12 mois, une fois le délai écoulé vos biens ne seront 
                 plus visible par les clients, sauf si vous renouvelez l'abonnement. 
                </p>
                <div class="info-agents color-a">
                <p>
                <strong>Prix : </strong> 250 000 FCFA</p>
                  <p>
                    <strong>Plus d'infos : </strong> +223 36 94 52 34</p>
                 
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ abonnement End /-->


  <!--/ Testimonials Star /-->
  <section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a"> Témoignages </h2>
            </div>
          </div>
        </div>
      </div>
      <div id="testimonial-carousel" class="owl-carousel owl-arrow">
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="{{ url('img/testimonial-1.jpg') }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                  Nous avons eu une expérience exceptionnelle avec IKASSO.
                  L'équipe a su écouter nos besoins et nous a proposé des biens parfaitement adaptés. 
                  Grâce à leur professionnalisme et à leur connaissance du marché, 
                  nous avons trouvé la maison de nos rêves.
                  Nous recommandons vivement IKASSO à tous ceux qui cherchent à acheter ou à louer un bien immobilier.
                  Merci encore pour votre soutien !
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="{{ url('img/mini-testimonial-1.jpg') }}" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Albert & Erika</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="{{ url('img/testimonial-2.jpg') }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                  Nous avons été ravis par le service de l'agence IKASSO. 
                  Ils ont rapidement compris nos attentes et nous ont aidés à trouver un appartement idéal. 
                  Leur expertise et leur disponibilité ont rendu le processus de location très simple et agréable. 
                  Nous les recommandons sans hésitation !
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="{{ url('img/mini-testimonial-2.jpg') }}" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Pablo & Emma</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Testimonials End /-->

  @endsection