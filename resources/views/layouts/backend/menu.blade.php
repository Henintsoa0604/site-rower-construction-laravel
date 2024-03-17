<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Rower Construction</title>

  <!-- Favicons -->
  <link href="{{ asset('backend/img/miraygeek.jpg')}}" rel="icon">
  <link href="{{asset('backend/img/miraygeek.jpg')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('backend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('backend/css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/gritter/css/jquery.gritter.css')}}" />
  <!-- Custom styles for this template -->
  <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
  
  <script src="{{asset('backend/lib/chart-master/Chart.js')}}"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>ROW<span>ER</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
           
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
           
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">@foreach($count_attente as $count) {{ $count->count }} @endforeach</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">Vous aves @foreach($count_attente as $count) {{ $count->count }} @endforeach demande d'information</p>
              </li>
              @foreach($attente as $attentes)
              <li>
                <a href="{{ route ('demande.editer', ['id'=>$attentes->id]) }}">
                  <span class="label label-danger"><i class="fa fa-user"></i></span>
                  {{ $attentes->nomClient}}
                  <span class="small italic">{{ $attentes->created_at}}</span>
                  </a>
              </li>
              @endforeach
              <li>
                <a href="{{ route('attente')}}">Voir tous</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
           <li><a class="logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Deconnexion</a>
            </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
         </form>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href=""><img src="{{ asset('backend/img/miraygeek.jpg')}}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          <li class="mt">
            <a class="active" href="{{route('home')}}">
              <i class="fa fa-dashboard"></i>
              <span>Accueil</span>
              </a>
          </li>
          <li >
            <a href="{{route('rower.profil')}}">
              <i class="fa fa-desktop"></i>
              <span>Rower construction</span>
              </a>
            
          </li>
          
          <li class="sub-menu">
            <a href="">
              <i class="fa fa-user"></i>
              <span>Gerer Membre</span>
              </a>
            <ul class="sub">
            <li><a href="{{route('membre')}}">Liste membre</a></li>
              <li><a href="{{route('membre.ajout')}}">Ajout membre</a></li>
              
            </ul>
          </li>

          <li class="sub-menu">
            <a href="">
              <i class="fa fa-trophy"></i>
              <span>Gerer Réalisation</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('realisation')}}">Liste réalisation</a></li>
              <li><a href="{{route('realisation.ajout')}}">Ajout réalisation</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="">
              <i class="fa fa-maxcdn"></i>
              <span>Gerer Modèle</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('modele')}}">Liste modèle</a></li>
              <li><a href="{{route('modele.ajout')}}">Ajout modèle</a></li>
              
            </ul>
          </li>

          <li class="sub-menu">
            <a href="">
              <i class="fa fa-th"></i>
              <span>Gerer blog</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('blog')}}">Liste blog</a></li>
              <li><a href="{{route('blog.ajout')}}">Ajout blog</a></li>
              
            </ul>
          </li>
           
          <li class="sub-menu">
            <a href="">
              <i class="fa fa-bell-o"></i>
              <span>Démande de devis</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('attente')}}">Démande en attente</a></li>
              <li><a href="{{ route('accepte')}}">Démande Accepté</a></li>
              
            </ul>
          </li>
          <li>
            <a href="{{route('activite')}}">
              <i class="fa fa-tasks"></i>
              <span>Gerer Activite </span>              
            </a>
          </li>
          <li>
            <a href="{{ route('type_construction')}}">
            <i class="fa fa-cogs"></i>
              <span>Type de Construction</span>              
            </a>
          </li>
         
         
          <li>
            <a href="{{route('partenaire')}}">
              <i class="fa fa-columns"></i>
              <span>Gerer Partenaire</span>
              </a>            
          </li>
         
        
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
   
     
        
           @yield('content')
        
    
   
    <!--main content end-->
    
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Bienvenu sur Rower Construction <a href="https://templatemag.com/"></a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('backend/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{asset('backend/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('backend/lib/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('backend/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/lib/jquery.sparkline.js')}}"></script>
<!--common script for all pages-->
<script src="{{asset('backend/lib/common-scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/lib/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/lib/gritter-conf.js')}}"></script>
 

</body>
</html>
