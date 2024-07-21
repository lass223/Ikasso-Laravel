<!DOCTYPE html>
<html lang="en">
  <title>IKASSO_Contract</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ url('img/favicon.png') }}" rel="icon">
  <link href="{{ url('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{ url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700') }}" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ url('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ url('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ url('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ url('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ url('css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  <style>
    h2 {
      text-align: center;
      margin-top: 50px;
    }
    p {
      font-size: 16px;
      line-height: 1.6;
      padding: 0 20px;
    }
    img .imgfond{
        text-align: center;
        margin-top: 20px;
        padding: -100px;
    }
    .plaque{
        margin-top: 20px;
        margin-bottom: 20px;
    }

  </style>
</head>
<body>
</head>

<body>


<div class="plaque">
<div class="row">
<div class="img-fond">
            <img src="{{ url('img/mf1.PNG') }}" alt="" class="img-fluid">
          </div>

<h2>Hello! Il est temps de faire de l'argent!</h2>
<p>
Bienvenue sur notre plateforme dédiée à la location et à la vente de biens immobiliers ! Êtes-vous prêt à vivre une expérience immersive dans le monde passionnant de l'immobilier ?
Nous sommes ravis de vous accueillir et de vous accompagner dans la mise en vente de votre propriété. Sur notre application, vous trouverez une sélection soigneusement choisie de biens immobiliers de qualité, ainsi que des outils intuitifs pour faciliter votre communication.

Ajoutez un nouveau bien dès maintenant et laissez-nous vous guider à chaque étape du processus.
</p>

    <div class="col-md-12 button-container">
    <button class="btn btn-a">
        <a href="{{ route('formBienVente', ['id_pro' => $id_pro]) }}">Mettre un bien en vente</a>
    </button>
    <button class="btn btn-a">
        <a href="{{ route('formBienLocation', ['id_pro' => $id_pro]) }}">Mettre un bien en Location</a>
    </button>
    </div>
</div>
</div>
</body>
</html>