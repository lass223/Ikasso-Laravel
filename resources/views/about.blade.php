@extends('base')
@section('content')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Nous mettons en ligne des propriétés exceptionnelles</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Acceuil</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                À propos
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ About Star /-->
  <section class="section-about">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="about-img-box">
            <img src="{{ url('img/slide-about-1.jpg') }}" alt="" class="img-fluid">
          </div>
          <div class="sinse-box">
            <h3 class="sinse-title">Agence IKASSO 
              <span></span>
              <br> Depuis 2024</h3>
            <p>Immobiler & Argents</p>
          </div>
        </div>
        <div class="col-md-12 section-t8">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <img src="{{ url('img/about1.jpg') }}" alt="" class="img-fluid" width="900">
            </div>
            <div class="col-lg-2  d-none d-lg-block">
              <div class="title-vertical d-flex justify-content-start">
                <span>IKASSO Propriétés exclusives </span>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 section-md-t3">
              <div class="title-box-d">
                <h3 class="title-d">IKASSO,
                  <span class="color-d">application</span> web 
                  <br> révolutionnaire,</h3>
              </div>
              <p class="color-text-a">
              conçue pour simplifier le processus de mise en location et de mise en vente de biens immobiliers
              La plateforme facilite la recherche et la gestion de biens immobiliers, tels que des appartements, des villas ou des maisons, en offrant une interface conviviale et sécurisée. IKASSO vise à résoudre plusieurs problématiques : les difficultés pour les propriétaires de trouver des locataires ou des acheteurs pour leurs biens immobiliers,
              </p>
              <p class="color-text-a">
              les difficultés pour les chercheurs de logements de faire face à une offre dispersée et peu transparente, le manque de transparence de certains bailleurs vis-à-vis des locataires, et les recherches fastidieuses pour les clients cherchant des logements répondant à leurs contraintes financières et besoins spécifiques. En plus d'être une agence immobilière qui met ses biens en vente et en location, IKASSO permet également à d'autres agences immobilières et particuliers (propriétaires) de mettre leurs biens sur la plateforme. 
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ About End /-->

  <!--/ Team Star /-->
  <section class="section-agents section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Rencontrez notre équipe</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="{{ url('img/about4.jpg') }}" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="#" class="link-two">Simbo Koly KEITA
                      <br> Agent</a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                professionnel qui facilite l'achat, la vente ou la location de biens immobiliers 
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +223 82 18 84 31</p>
                  <p>
                    <strong>Email: </strong> ksimbo79@gmail.com</p>
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
              <img src="{{ url('img/about5.jpg') }}" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="{{ url('agent-single.blade.php') }}" class="link-two">Lassana DOUMBIA
                      <br> Dev</a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                Un développeur passionné par la création de solutions innovantes, il transforme des idées en applications fonctionnelles
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +223 76 89 77 44</p>
                  <p>
                    <strong>Email: </strong> lassboyy@gmail.com</p>
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
              <img src="{{ url('img/about6.jpg') }}" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="{{ url('agent-single.blade.php') }}" class="link-two">Emma Toledo
                      <br> Marketing</a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                Chargée de marketing dynamique et créative, elle excelle à connecter les marques avec leur public cible
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +223 66 77 45 33</p>
                  <p>
                    <strong>Email: </strong> emmatoldero@gmail.com</p>
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
  <!--/ Team End /-->

   @endsection