<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Sailor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v2.3.1
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
    
      <div class="container">
    
        <div class="row">

          <div class="col-lg-8">
            <h2 class="portfolio-title">{{ $realisations->nomRealisation}}</h2>
            <div class="owl-carousel portfolio-details-carousel">
              <img src="{{asset('uploads/realisations/'.$realisations->imageRealisation)}}" class="img-fluid" alt="">              
            </div>
          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>Information de la realisation</h3>
            <ul>
              <li><strong>Nom</strong>: {{ $realisations->nomRealisation}}</li>
              <li><strong>Architecte</strong>: {{ $realisations->architecte}}</li>
              <li><strong>Maitre d'ouvrage</strong>: {{ $realisations->maitreOuvrage}}</li>
              <li><strong>Montant de la realisation</strong>: <a href="#">{{ $realisations->montantRealisation}} Ar</a></li>
            </ul>
            <h3>Lieu de la realisation</h3>
            <ul>
              <li><strong>Province</strong>: {{ $realisations->province}}</li>
              <li><strong>Region</strong>: {{ $realisations->region}}</li>
              <li><strong>Ville</strong>: {{ $realisations->ville}}</li>
              
            </ul>

            <p>
            {{ $realisations->descriptionRealisation}}.
            </p>
          </div>
          
        </div>
      
      </div>
   
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/js/main.js')}}"></script>

</body>

</html>