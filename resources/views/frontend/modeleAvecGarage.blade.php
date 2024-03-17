@extends('layouts.frontend.header')

@section('content')

<style>
  .blog .sidebar .tags1 {
  margin-bottom: -10px;
}

.blog .sidebar .tags1 ul {
  list-style: none;
  padding: 0;
}

.blog .sidebar .tags1 ul li {
  display: inline-block;
}

.blog .sidebar .tags1 ul a {
  color: #96a2af;
  font-size: 14px;
  padding: 6px 14px;
  margin: 0 6px 8px 0;
  border: 1px solid #dee2e6;
  display: inline-block;
  border-radius: 4px;
  transition: 0.3s;
}

.blog .sidebar .tags1 ul a:hover {
  color: #fff;
  border: 1px solid #d9232d;
  background: #d9232d;
}

.blog .sidebar .tags1 ul a span {
  padding-left: 5px;
  color: #fbfbfc;
  font-size: 14px;
}

</style>

<main id="main">


 <!-- ======= Header ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container"      
      <div class="row content">
          <div class="col-lg-16">
          <h1><center><strong style="color:#d9232d;">" </strong>
            
               Votre future maison se trouve certainement ici !

          <strong style="color:#d9232d;">" </strong></center></h1>            
             <h3> <center>Parmi nos <strong >@foreach($countModeles as $count) {{ $count->count }} @endforeach </strong> modèles,
              vous trouverez très certainement le modèle de maison qui vous convient le mieux.</center> </h3> <br>            
          </div>          
        </div>

      </div>
    </section>
    <!-- End header -->  
     
    <div>
    <br>
    <h4 style="margin-left:10%;font-family: 'Open Sans', sans-serif;"> 
      <a href="{{route('accueil')}}" style="color:#444444"> Accueil > </a>
      <a href="{{ route('modele.liste')}}" style="color:#444444">Nos modèle > </a>
      <a href="">Modele avec garage</a>
    </h4>
    </div>
    <br>
    <h1 class="portfolio-title" style="margin-left:17%;color:#d9232d;">Ces modèles avec garage peuvent vous intéresser</h1><br>
   
    <div style="margin-left:10%">
       
        <a href="{{route('modele.prix.croissants')}}"> <button class="btn btn-outline-secondary">trie par prix croissante</button> </a> &nbsp&nbsp 
           <a href="{{route('modele.prix.decroissants')}}"><button class="btn btn-outline-secondary">trie par prix decroissante</button></a>   &nbsp&nbsp  
           <a href="{{route('modele.garage.oui')}}"><button class="btn btn-outline-secondary">modèle avec garage</button></a>   &nbsp&nbsp 
           <a href="{{route('modele.garage.non')}}"><button class="btn btn-outline-secondary">modèle sans garage</button></a>   &nbsp&nbsp 
              
    </div>
    <!-- ======= Modele Section ======= -->
    <section id="pricing" class="pricing">    
      <div class="container">
       
        <div class="row">
        
        @foreach($avecGarage as $avecGarages)
        
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box">
              <span class="advanced">Modele3D</span>
              <img src="{{asset('uploads/modeles/'.$avecGarages->imageIllustration)}}" alt="" height="200" width="310">
              <?php
														$number =  $avecGarages->montantDeOperation;
														$n=  str_replace(',',' ', number_format($number,3));
														$a = strstr($n, '.');
														$prix= str_replace($a,'',$n);
														
							?>
              <p>
              <span style="color:black;font-family:'Brandon Grotesque', 'sans-serif';font-size: 25px;">
              {{$avecGarages->nomModele}}
              </span>  <br>
              à partir de <br>
              <span style="font-family:'Poppins', 'sans-seri';font-size: 30px;">
              {{$prix}} Ar 
              </span>
              </p>
               
              <div class="btn-wrap">
                <a href="{{route('modele.detail', ['modeles.id'=>$avecGarages->id])}}" class="btn-buy">Voir le detail</a>
              </div>
            </div>
            <br><br>
          </div>
          
          @endforeach
          
        </div>    
       
        <div class="blog">
            <div class="blog-pagination" data-aos="fade-up">
              <ul class="justify-content-center">                
                {{ $avecGarage->links() }}
              </ul>
            </div>
        </div>
      </div>
    </section><!-- End Modele Section -->

    <!-- ======= Partenaires Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">
      <h2> Des partenaires de confiance</h2>
      <h5>pour vous offrir ce qu’il existe de mieux</h5>
        <div class="row">
        
       

        @foreach($partenaire as $partenaires)
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{asset('uploads/partenaires/'.$partenaires->logoPartenaire)}}" class="img-fluid" alt="">
          </div>
        @endforeach    
        </div>
       <p>
       Rower Construction vous fait bénéficier de sa forte capacité de négociation auprès des plus grandes 
       marques de matériaux de construction et équipements pour vous faire profiter de ce qu’il existe 
       de mieux en matière d’isolation thermique,
        de chauffage et de sécurité
       </p>
      </div>
    </section><!-- End Partenaires Section -->

     <!-- ======= Portfolio Details Section ======= -->
     <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row">          
       <h1 class="portfolio-title" style="margin-left:30%">Les équipements de ce modèle de maison</h1>
            <h4 style="margin-left:15%">Une maison contemporaine et bioclimatique au meilleur rapport qualité-prix.</h4>
            <br><br><br><br>
            <div class="col-lg-8">
            <div class="owl-carousel portfolio-details-carousel" >
              <img src="{{asset('frontend/img/portfolio/alarme.jpg')}}" class="img-fluid" alt="">
              <img src="{{asset('frontend/img/portfolio/chauffe-eau-thermodynamique.jpg')}}" class="img-fluid" alt="">
              <img src="{{asset('frontend/img/portfolio/interrupteurs.jpg')}}" class="img-fluid" alt="">
            </div>
          </div>
  
          <div class="col-lg-4 portfolio-info">
          <br><br>
            <h3>
            <img src="{{asset('frontend/img/portfolio/picto-detect-fumee.png')}}" class="img-fluid" alt="" height="30" width="40">            
            &nbsp&nbsp Détecteurs de fumée
            </h3> <br>

          
            <h3> 
            <img src="{{asset('frontend/img/portfolio/picto-volets-solaires.png')}}" class="img-fluid" alt="" height="30" width="40">            
            &nbsp&nbsp
            Interrupteurs Schneider</h3> <br>
        
            <h3>
            <img src="{{asset('frontend/img/portfolio/picto-serrures.png')}}" class="img-fluid" alt="" height="30" width="40">            
            &nbsp&nbsp
            Chauffe-eau </h3> <br>

            
            <h3>
            <img src="{{asset('frontend/img/portfolio/picto-detect-fumee.png')}}" class="img-fluid" alt="" height="30" width="40">            
            &nbsp&nbsp
            Système d'alarme </h3>

            
                       
          </div>
          
          

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

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

</main><!-- End #main -->

@endsection()