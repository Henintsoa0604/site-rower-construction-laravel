@extends('layouts.frontend.header')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('frontend/img/portfolio/1622551562.jpg')}});">
          <div class="carousel-container">
          <div class="container">
              <h2 class="animate__animated animate__fadeInDown">
              Actuellement, + de <strong>@foreach($countRealisations as $count) {{ $count->count }} @endforeach </strong>
              réalisations déja realisé par Rower Construction
              </h2>             
            
            </div>
          </div>
          
        </div>
       </div>
    
    </div>
    
  </section><!-- End Hero -->

<main id="main">    
    <div>
    <br>
    <h4 style="margin-left:10%;font-family: 'Open Sans', sans-serif;"> 
      <a href="{{route('accueil')}}" style="color:#444444"> Accueil > </a>
      <a href="">Nos réalisation</a>
    </h4>
    </div>
<!-- ======= Blog Section ======= -->
    <div id="blog" class="blog">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">       
            <h3 class="portfolio-title" style=" font-family: 'Raleway', 'sans-serif'; font-size:37px">
            En tant que constructeur de maisons individuelles responsable,
             Rower Construction a conçu des maisons basse consommation pour répondre aux besoins de chaque famille.
             </h3>
            
          </div><!-- End blog sidebar -->
          <div class="col-lg-4">     
          <div class="sidebar">       
               <h4 class="sidebar-title">Recherche</h4>
                <div class="sidebar-item search-form">
                    <form action="">
                    <input type="text">
                    <button type="submit" class="danger"><i class="icofont-search"></i></button>
                    </form>
                </div><!-- End sidebar search formn-->         
          </div><!-- End blog sidebar -->
        </div>
      </div>
    </div>
<!-- End Blog Section -->  
    <!-- ======= Portfolio Details Section ======= -->
    @foreach($realisations as $realisation)
    <section id="portfolio-details" class="portfolio-details" >
      <div class="container" style="margin-bottom: -80px;">

        <div class="row">

          <div class="col-lg-8">
            <h2 class="portfolio-title">{{ $realisation->nomRealisation}}</h2>
            <div class="owl-carousel portfolio-details-carousel">
              <img src="{{asset('uploads/realisations/'.$realisation->imageRealisation)}}" class="img-fluid" alt="">
              
            </div>
          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>information de la réalisation</h3>
            <ul>
            <li><strong>Nom</strong>: {{ $realisation->nomRealisation}}</li> 
            <?php
														$number =  $realisation->montantRealisation;
														$n=  str_replace(',',' ', number_format($number,3));
														$a = strstr($n, '.');
														$prix= str_replace($a,'',$n);
														
							?>            
            <li><strong>Montant de la réalisation</strong>: <a href="#">{{ $prix}} Ar</a></li>
            <li><strong>Type de la construction</strong>: {{ $realisation->nom_Type}}</li>
            </ul>
            <h3>Lieu de la réalisation</h3>
            <ul>
              <li><strong>Province</strong>: {{ $realisation->province}}</li>
              <li><strong>Region</strong>: {{ $realisation->region}}</li>
              <li><strong>Ville</strong>: {{ $realisation->ville}}</li>
              
            </ul>
            <h3>Acteur de la réalisation</h3>
            <ul>
              <li><strong>Architecte</strong>: {{ $realisation->architecte}}</li>
              <li><strong>Maitre d'ouvrage</strong>: {{ $realisation->maitreOuvrage}}</li>              
            </ul>

            <a href="{{route('realisation.sow', ['id'=>$realisation->id])}}" class="get-started-btn ml-auto">Voir le detail</a>
          </div>
          
        </div>
         <hr>
      </div>
      
    </section><!-- End Portfolio Details Section -->
@endforeach 
<div class="blog">
            <div class="blog-pagination" data-aos="fade-up">
              <ul class="justify-content-center">                
                {{ $realisations->links() }}
              </ul>
            </div>
        </div>
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>NOS CONSEILLERS RESTENT DISPONIBLES POUR VOUS ACCOMPAGNER PAR TÉLÉPHONE OU EMAIL.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Nos Adresse</h3>
                  <p> 301 BP ,@foreach($rowers as $rower) {{ $rower->siege }} @endforeach</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Nos Email </h3>
                  <p>@foreach($rowers as $rower) {{ $rower->mail }} @endforeach<br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Nos telephone</h3>
                  <p>@foreach($rowers as $rower) {{ $rower->telephone }} @endforeach<br></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="{{route('distrubition.ajout')}}" method="post" role="form" class="php-email-form">
            {{ csrf_field() }}
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="nomClient" class="form-control" id="name" placeholder="Entre votre nom" data-rule="minlen:4" data-msg="Entre votre nom s'il vous plait" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="prenomClient" placeholder="Entre votre prenom"  />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="telephoneClient" class="form-control" id="name" placeholder="Entre votre numero telephone" data-rule="minlen:10" data-msg="Entre votre numero telephone" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="emailClient" id="email" placeholder="Entre votre mail" data-rule="email" data-msg="Entre votre adresse email"/>
                  <div class="validate"></div>
                </div>
              </div>              
              <div class="form-group">
                <textarea class="form-control" name="message" rows="4" data-rule="required" data-msg="Entre votre contenu de message" placeholder="Votre message..."></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>  
                              
              </div>
              <div class="text-center"><button type="submit">Envoye Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
  
   <!-- ======= demande  Section ======= -->
   <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-16">
            <h3><center>Vous aussi vous avez un projet de construction économe  ?</center> </h3>
             <h2> <center>Nos conseillers restent disponibles pour vous accompagner par téléphone ou email.</center> </h2>
             <center> <a href="#contact" class="get-started-btn ml-auto">Demande d'information</a></center>
          </div>
          
        </div>

      </div>
    </section><!-- End demande Section -->
    @include('frontend/information');
  </main><!-- End #main -->

@endsection()