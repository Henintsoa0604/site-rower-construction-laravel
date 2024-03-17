@extends('layouts.frontend.header')

@section('content')
 <!-- ======= Hero Section ======= -->
 <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('uploads/realisations/'.$realisations->imageRealisation)}})">
          <div class="carousel-container">
           
          </div>
          
        </div>
       </div>
    
    </div>
    
  </section><!-- End Hero -->
  <main id="main">
   <!-- ======= Clients Section ======= -->
<section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row">

        
          <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center" >
          <i class="icofont-bricks" style="color: #d9232d;font-size: 40px;"> </i>
          <h5>  &nbsp&nbsp {{ $realisations->nomRealisation}}</h5>
          </div>

          <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <i class="bx bx-map" style="color: #d9232d;font-size: 40px;"> </i>
          <h5> &nbsp&nbsp  {{ $realisations->province}}</h5>
          </div>

          
          <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <i class="icofont-money" style="color: #d9232d;font-size: 40px;"> </i>
            <?php
														$number =  $realisations->montantRealisation;
														$n=  str_replace(',',' ', number_format($number,3));
														$a = strstr($n, '.');
														$prix= str_replace($a,'',$n);
														
							?>
            <h5>&nbsp&nbsp  {{$prix}} Ar </h5>
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <div class="row content">
          <div class="col-lg-16">
           
             <center> <a href="" data-toggle="modal" data-target="#myModal" class="get-started-btn">Obtenir le plan</a></center>
          </div>
          
        </div>
          </div>

 

        </div>

      </div>
    </section><!-- End Clients Section -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-8">
            <h2>{{ $realisations->nomRealisation}} </h2>
            <p> {{ $realisations->descriptionRealisation}}.</p>
            <h3>La construction de la {{ $realisations->nomRealisation}} est situe a {{ $realisations->province}} 
            {{ $realisations->ville}}, le montant de la realisation est a partir {{ $prix}} Ar
            </h3>
          </div>
          
          <div class="col-lg-4 pt-4 pt-lg-0" style="background: #8795a4;">
            <p> <center>
               LIEU DE CONSTRUCTION</center>
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Province : {{ $realisations->province}}</li>
              <li><i class="ri-check-double-line"></i> Nom de la ville : {{ $realisations->ville}}</li>              
            </ul>
            <p> <center>
               ACTEUR DE CONSTRUCTION</center>
            </p>
            <ul>              
              <li><i class="ri-check-double-line"></i> L'arcitecte : {{ $realisations->architecte}}</li>            
              <li><i class="ri-check-double-line"></i> Le Maitre d'ouvrage : {{ $realisations->maitreOuvrage}}</li>
            </ul>
            
          </div>
          
        </div>

      </div>
    </section><!-- End About Section -->
    
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Photo durant la realisation</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">galleries (@foreach($countGalleries as $count) {{ $count->count }} @endforeach) </li>
              
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container">
        @foreach($galleries as $gallery)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap"
            style=" height:200px;
                background-image:url('{{asset('uploads/Gallery/'.$gallery->gallery)}}');
                background-repeat:no-repeat;
                background-size:cover;
                backgroud-position:center;"
            >
             
              <div class="portfolio-info">
                <h4>{{ $realisations->nomRealisation}}</h4>
                <p>Voir</p>
                <div class="portfolio-links">
                  <a href="{{asset('uploads/Gallery/'.$gallery->gallery)}}" data-gall="portfolioGallery" class="venobox" title="Gallery du photo de la realisatiion {{ $realisations->nomRealisation}} "><i class="bx bx-plus"></i></a>
                 
                </div>
              </div>
            </div>
          </div>
        @endforeach


        </div>

      </div>
    </section>
    <!-- End Portfolio Section -->
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

  </main>
@endsection()