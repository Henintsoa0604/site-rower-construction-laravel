
@extends('layouts.frontend.header')

@section('content')
<main id="main">

 <!-- ======= Header ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

      <div class="row content">
          <div class="col-lg-16">
          <h1><center><strong style="color:#d9232d;">" </strong>         
              
                        Nos engagements
          <strong style="color:#d9232d;">" </strong></center></h1> <br>
            <h4><center>En tant que constructeur de maisons individuelles responsable, 
                Rower Construction a conçu 
                des maisons basse consommation pour répondre aux besoins de chaque famille.</center> </h4>
             
          </div>
          
        </div>

      </div>
    </section>
    <!-- End header -->

     <!-- ======= Portfolio Details Section ======= -->
     <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row">

          
      <br><br><br>
            <div class="col-lg-6">
            <div class="owl-carousel portfolio-details-carousel">
             
              <img src="{{asset('frontend/img/portfolio/2.jpg')}}" class="img-fluid" alt="">
              
            </div>
          </div>
  
          <div class="col-lg-6 portfolio-info">
          
            <h2>          
            A vos côtés depuis {{ $aff }}
            </h2>
            <br>

            <h5> 
            Créé en {{ $aff }}, le groupe Rower Construction réalise la construction de maisons individuelles 
            sur plus de 25 départements à Madagasikara
            .Avec plus de 50 000 maisons construites, Rower Construction figure parmi les leaders
            à Madagasikara de l’accession à la propriété, en proposant des maisons individuelles innovantes 
             et économes en énergie, au meilleur rapport qualité-prix du marché.
            </h5>                  
          </div>   
          <br><br>
          <div class="col-lg-4">          
             <center><img src="{{asset('frontend/img/portfolio/partenaire.png')}}" class="img-fluid" alt="" height="40" width="60"></center> <br>
              <h4>Des partenaires de confiance</h4>
              <p>Tout au long de votre projet de construction de maison, chacun de
               nos partenaires qualifiés dans leur domaine vous fera bénéficier d’un 
               savoir-faire établi.</p>
            
          </div> 
          <br><br>  
          <div class="col-lg-4">        
             
            <center><img src="{{asset('frontend/img/portfolio/qualite.png')}}" class="img-fluid" alt="" height="50" width="70"></center> <br>
              <h4>La qualité de nos maisons</h4>
              <p>Ce qui ne se voit pas est pour nous le plus important ! Parce que le bâti 
              d’un bien immobilier est essentiel, toutes nos maisons sont conçues de façon optimale.</p>
            </div>
            <div class="col-lg-4">        
             
             <center><img src="{{asset('frontend/img/portfolio/acc.png')}}" class="img-fluid" alt="" height="50" width="70"></center> <br>
              
               <h4>Un accompagnement de A à Z</h4>
               <p>Pour un projet de construction en toute sérénité,
                vous bénéficiez d’un interlocuteur unique à chaque étape.</p>
             </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

     <!-- ======= Portfolio Details Section ======= -->
     <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row">

          
      
         
            <br><br>
            <div class="col-lg-6">
            <div class="owl-carousel portfolio-details-carousel">
              <img src="{{asset('frontend/img/portfolio/images_1.jpeg')}}" class="img-fluid" alt="">
              <img src="{{asset('frontend/img/portfolio/r.jpg')}}" class="img-fluid" alt="">
              <img src="{{asset('frontend/img/portfolio/imagesg.jpg')}}" class="img-fluid" alt="">
              
            </div>
          </div>
  
          <div class="col-lg-6 portfolio-info">         
          <h1 class="portfolio-title" >Les garanties en + chez Rower :</h1>
            <h3> 
            <i class="ri-check-double-line" style="color: #d9232d;"> </i>
            Contrôle qualité de chantier</h3>
            <h3> 
            <i class="ri-check-double-line" style="color: #d9232d;"> </i>
            Assistance d’un expert à la réception de la maison</h3>
            <h3> 
            <i class="ri-check-double-line" style="color: #d9232d;"> </i>
            Assurances multirisques</h3>
            <h3> 
            <i class="ri-check-double-line" style="color: #d9232d;"> </i>
            La garantie de livraison à prix et délais convenus</h3>
                 
          </div>
          
          

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

    <!-- ======= Header ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

      <div class="row content">
          <div class="col-lg-16">
          <h1><center><strong style="color:#d9232d;">" </strong>         
              
                        Nos valeurs
          <strong style="color:#d9232d;">" </strong></center></h1> <br>
            <h4><center>La culture Rower Construction repose sur trois (3) obsessions partagées 
            par toutes nos équipes :</center> </h4>

            <br><br>
          
            <div class="row">
             <div class="col-md-6">
            <div class="icon-box">
             
              
               <center> <h4><a href="#">L’obsession de la qualité</a></h4></center>
                <p> 
                <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                La qualité du bâti, avec le choix des matériaux et équipements les plus performants
                et éco-responsables ainsi que des techniques de construction traditionnelles.
                </p>
                <p> 
                <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                La qualité des services que nous vous offrons pour faciliter la réalisation de votre projet : 
                au financement, recherche de terrain, obtention du permis de construire.
                </p>
             
            </div>
          </div>
          <br><br>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
            
             <center><h4><a href="#">L’obsession de faire toujours plus et mieux</a></h4></center> 
             <p> 
                <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                Passionnés par notre métier, 
                nous nous battons pour toujours avoir une longueur d’avance sur les réglementations environnementales :
            </p>
            <p> 
                <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                Tester de nouveaux matériaux, techniques et équipements, vous faire bénéficier des meilleures innovations,
            </p>
            <p> 
                <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                Trouver les meilleurs partenaires.
            </p>
            <p> 
                <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                Recruter, former les meilleures équipes et donner à chacun les moyens de se dépasser.
            </p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
            <center><h4><a href="#">L’obsession du respect de nos engagements</a></h4></center> 
             <p> 
                <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                Apporter les meilleures garanties sur la qualité, les prix, les délais. 
                Et se donner les moyens de respecter ses engagements en faisant preuve de rigueur.
            </p>    
            </div>
          </div>
        
     
        </div>
             
          </div>
          
        </div>

      </div>
    </section>

     <!-- ======= Features Section ======= -->
     <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>accompagnement de A à Z</h2>
          <p>Accompagnement de ses clients au cœur de ses priorités. 
          </p>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Le conseiller commercial</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">La gestionnaire administrative</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">Le lanceur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">Le conducteur de travaux</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-5">L’ingénieur contrôle qualité</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Le conseiller commercial</h3>
                    <p class="font-italic">Les missions du conseiller commercial Rower Construction :</p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Il est votre premier contact avec Rower Construction
                    </p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Il vous guide et vous conseille dans la formulation de votre projet, le choix de votre maison, 
                        la recherche du terrain idéal.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset('frontend/img/commerce.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>La gestionnaire administrative</h3>
                    <p class="font-italic">Les missions de la gestionnaire administrative Rower Construction  :</p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Elle gère pour votre compte toutes les démarches administratives à effectuer avant le lancement
                         du chantier ainsi que toutes les démarches liées à l’obtention du permis de construire.
                    </p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Elle est votre contact privilégié pour tout ce qui concerne le suivi de votre dossier administratif (dépôt de la demande de financement 
                        et du permis de construire, suivi du dossier, relance des différents organismes…)
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="{{asset('frontend/img/gestion.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Le lanceur</h3>
                    <p class="font-italic">Les missions du lanceur Rower Construction :</p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Il s’occupe d’une fonction clé dans le déroulement de votre projet de construction
                         car il assure la transition entre la phase administrative et la phase travaux de construction.
                    </p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Il est le garant de l’ouverture de chantier.
                    </p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Lors du rendez-vous, il valide avec vous tous les détails d’ordre contractuel,
                         administratif et technique  de votre projet afin de s’assurer que vos désirs seront respectés.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="{{asset('frontend/img/lanceur.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Le conducteur de travaux</h3>
                    <p class="font-italic"> voici les missions du conducteur de travaux Rower Construction :</p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Il est votre interlocuteur unique du début des travaux jusqu’à la réception de votre maison.
                    </p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Il assure le suivi des travaux en planifiant toutes les étapes du chantier et pilotant sa mise en œuvre.
                    </p>
             
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Chaque semaine, il vous informe de l’avancée des travaux et 
                        répond à vos éventuelles questions jusqu’à un an après la fin des travaux
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset('frontend/img/conducteur.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>L’ingénieur contrôle qualité</h3>
                    <p class="font-italic">Les missions de l’ingénieur « contrôle qualité » Rower Construction dans le cadre du chantier :</p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Il intervient en tant qu’expert et il supervise le conducteur de travaux durant toute la phase chantier :
                        érification des structures, des points à risques, du respect des règlementations en vigueur… et i
                        veille à l’adéquation de la réalisation de la structure avec les documents contractuels et réglementaires.
                    </p>
                    <p> 
                        <i class="ri-check-double-line" style="color: #d9232d;"> </i>
                        Il peut être amené à réaliser des tests 
                        de perméabilité de votre maison et est le référent vis-à-vis des organismes de contrôle.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="{{asset('frontend/img/ingenieur.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->
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
    
    <!-- End header -->
    </main>

@endsection()