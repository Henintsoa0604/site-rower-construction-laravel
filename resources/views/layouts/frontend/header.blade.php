<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rower Construction - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('backend/img/miraygeek.jpg')}}" rel="icon">
  <link href="{{asset('backend/img/miraygeek.jpg')}}" rel="apple-touch-icon">

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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
    @foreach($rowers as $rower)
      <h1 class="logo"><a href=""><img src="{{asset('uploads/societe/'.$rower->logo)}}" alt="logo" width="250" height="60"></a></h1>
    @endforeach
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="{{ 'accueil' == request()->path() ? 'active':''}}"><a href="{{route('accueil')}}">Accueil</a></li>
          <li class="{{ 'modele/liste'  == request()->path() ? 'active':''}}"><a href="{{ route('modele.liste')}}">Nos modèles</a></li>
          <li class="{{ 'realisation/liste' == request()->path() ? 'active':''}}"><a href="{{ route('realisation.liste')}}">Nos réalisations</a></li>
          <li class="{{ 'nos-valeur'== request()->path()  ? 'active':''}}" ><a href="{{ route('valeur')}}">Nos valeurs et engagements</a></li>
          <li class="{{ 'blog' == request()->path() ? 'active':''}}"><a href="{{ route('blog.liste')}}">Blog</a></li>
          <li ><a href="#contact">Contact</a></li>
          

        </ul>

      </nav><!-- .nav-menu -->

      

    </div>
  </header><!-- End Header -->

  @yield('content')
   
    <!-- ======= Footer ======= -->
    <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Contact</h3>
              <p>
                301 Code Postal <br>
                @foreach($rowers as $rower) {{ $rower->siege }} @endforeach<br><br>
                <strong>Phone:</strong> @foreach($rowers as $rower) {{ $rower->telephone }} @endforeach<br>
                <strong>Email:</strong> @foreach($rowers as $rower) {{ $rower->mail }} @endforeach<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('accueil')}}">Accueil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">A propos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('modele.liste')}}">Nos modèles</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('realisation.liste')}}">Nos resalisations</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos activités</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Construction</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Production du plan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cree modèles</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Estimation de construction</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Reconstruction</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Description</h4>
            <p>@foreach($rowers as $rower) {{ $rower->description }} @endforeach</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
       <strong><span>www.rowerconstruction.com</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        cree par <a href="https://bootstrapmade.com/">MirayGeek</a>
      </div>
    </div>
  </footer><!-- End Footer -->

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