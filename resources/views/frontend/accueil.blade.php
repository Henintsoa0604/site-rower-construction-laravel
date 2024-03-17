
@extends('layouts.frontend.header')

@section('content')
 <!-- ======= slide Section ======= -->
 <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
    
        
        <div class="carousel-item active" style="background-image: url(@foreach($modeleUn as $modeleUns) {{asset('uploads/modeles/'.$modeleUns->imageIllustration)}}@endforeach)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Bienvenue sur @foreach($rowers as $rower) {{ $rower->nom }} @endforeach</h2>
              <p class="animate__animated animate__fadeInUp" style="font-family:'Brandon Grotesque', 'sans-serif';font-size: 20px;"> 
              @foreach($rowers as $rower) {{ $rower->description }} @endforeach.</p>
              <a href="" class="btn-get-started animate__animated animate__fadeInUp scrollto" data-toggle="modal" data-target="#myModal">Demande d'information</a>
              
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(@foreach($modeleDeux as $modeleDeuxs) {{asset('uploads/modeles/'.$modeleDeuxs->imageIllustration)}}@endforeach)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">
              Plus de <strong>@foreach($countModeles as $count) {{ $count->count }} @endforeach</strong> Modèles <br> Adaptés à tous les styles de vie
              </h2>
              <p class="animate__animated animate__fadeInUp" style="font-family:'Brandon Grotesque', 'sans-serif';font-size: 20px;">
              Trouve le modèle de maison qui vous convient parmi nos @foreach($countModeles as $count) {{ $count->count }} @endforeach modèles </p>
              <a href="" class="btn-get-started animate__animated animate__fadeInUp scrollto">Decouvrir nos Modèles</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image:  url(@foreach($modele3 as $modele3s) {{asset('uploads/modeles/'.$modele3s->imageIllustration)}}@endforeach)">
          <div class="carousel-container">
            <div class="container">
            <h2 class="animate__animated animate__fadeInDown">
              Plus de <strong>@foreach($countModeles as $count) {{ $count->count }} @endforeach</strong> Modèles <br> Adaptés à tous les styles de vie
              </h2>
              <p class="animate__animated animate__fadeInUp" style="font-family:'Brandon Grotesque', 'sans-serif';font-size: 20px;">
              Choisissez votre future maison neuve à partir de nos modèles de maisons.</p>
              <a href="" class="btn-get-started animate__animated animate__fadeInUp scrollto">Decouvrir nos Modèles</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- slide Hero -->
 
  <main id="main">

    <!-- ======= type construction Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row content">
            <div class="col-lg-4">          
                <center><img src="{{asset('frontend/img/portfolio/partenaire.png')}}" class="img-fluid" alt="" height="40" width="60"></center> <br>
                  <h4>Des partenaires de confiance</h4>
                  <p>Rower Construction vous fait bénéficier de sa forte capacité de négociation auprès 
                    des plus grandes marques de matériaux de construction et équipements pour vous faire profiter 
                    de ce qu’il existe de mieux en matière d’isolation thermique, de chauffage et de sécurité.</p>
              </div> 
          <br><br>          
              <div class="col-lg-4">                     
                <center><img src="{{asset('frontend/img/portfolio/qualite.png')}}" class="img-fluid" alt="" height="50" width="70"></center> <br>
                  <h4>La qualité de nos maisons</h4>
                  <p>La qualité du bâti, avec le choix des matériaux et équipements 
                    les plus performants et éco-responsables ainsi que des techniques de construction traditionnelles.
                    La qualité des services que nous vous offrons pour faciliter la réalisation de votre projet.</p>
                </div>             
                <div class="col-lg-4">        
                <center><img src="{{asset('frontend/img/portfolio/acc.png')}}" class="img-fluid" alt="" height="50" width="70"></center> <br>              
                  <h4>Service après-vente et garanties</h4>
                  <p>Rower Construction vous accompagne également après la réception de votre maison, pendant 10 ans.
                     Les techniciens de notre service après-vente sont à votre écoute pour vous apporter des solutions 
                     personnalisées et répondre à vos attentes.</p>
                </div>
                
          <div class="col-lg-6">
          <br><br> <br>
            <h2>@foreach($rowers as $rower) {{ $rower->nom }} @endforeach</h2>
            <h3><strong style="color:#d9232d;">" </strong>
            La satisfaction des clients est notre priorité
            <strong style="color:#d9232d;">" </strong></h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
          <br><br> <br>
            <p>
            En tant que constructeur, Rower a conçu des differentes 
            type de construction comme :
            </p>
            <ul>
            @foreach($type as $types)
              <li><i class="ri-check-double-line"></i> {{ $types->nom_Type }}</li>
              
            @endforeach
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End type construction  Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team ">
      <div class="container">
      <div class="section-title">
          <h2>Membre</h2>
          <p>Membre de bureau chez Rower Construction</p>
        </div>
        <div class="row">
        @foreach($membres as $membre)
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"
              style="height:120px; 
                   background-image:url('{{asset('uploads/membre/'.$membre->imageMembre)}}');
                   background-repeat:no-repeat;
                   background-size:cover;
                   backgroud-position:center;"
              >
              </div>
              <div class="member-info">
                <h4>{{ $membre->nomMembre}} {{ $membre->prenom}}</h4>
                <span>{{ $membre->poste}}</span>
                <p>{{ $membre->descriptionMembre}}</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
            <br>
          </div>
        @endforeach
      
        </div>

      </div>
    </section><!-- End Team Section -->

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
    </section>
    <!-- End Partenaires Section -->

     <!-- ======= Counts Section ======= -->
     <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="icofont-paint-brush"></i>
              <span data-toggle="counter-up">@foreach($countRealisations as $count) {{ $count->count }} @endforeach</span>
              <p>Nombre de construction</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-barricade"></i>
              <span data-toggle="counter-up">@foreach($countModeles as $count) {{ $count->count }} @endforeach</span>
              <p>Nombre de modèle</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-worker"></i>
              <span data-toggle="counter-up">@foreach($countMembres as $count) {{ $count->count }} @endforeach</span>
              <p>Nombre de membre</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="icofont-recycle-alt"></i>
              <span data-toggle="counter-up">@foreach($countBlogs as $count) {{ $count->count }} @endforeach</span>
              <p>Nombre de partenaire</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Activites Section ======= -->
    <section id="tabs" class="tabs">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Activites</h2>
          <p>Nos differentes activites</p>
        </div>
        <ul class="nav nav-tabs row d-flex">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-toggle="tab" href="#tab-1">
              <i class="icofont-paint-brush"></i>
              <h4 class="d-none d-lg-block"> @foreach($activite1 as $activite1s) {{ $activite1s->nom }} @endforeach</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-toggle="tab" href="#tab-2">
              <i class="icofont-calculations"></i>
              <h4 class="d-none d-lg-block">@foreach($activite2 as $activite2s) {{ $activite2s->nom }} @endforeach</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-toggle="tab" href="#tab-3">
              <i class="icofont-architecture"></i>
              <h4 class="d-none d-lg-block">@foreach($activite3 as $activite3s) {{ $activite3s->nom }} @endforeach</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-toggle="tab" href="#tab-4">
              <i class="icofont-barricade"></i>
              <h4 class="d-none d-lg-block">@foreach($activite4 as $activite4s) {{ $activite4s->nom }} @endforeach</h4>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
            
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <br><br>
                <h3>Tous differents type de construction.</h3>
                <p class="font-italic">
                  Rower Construction construire tous les differente type de construction comme :
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i>Construction de bureaux.</li>
                  <li><i class="ri-check-double-line"></i>Construction de batiment.</li>
                  <li><i class="ri-check-double-line"></i>Construction de bâtiment industriel.</li>
                  <li><i class="ri-check-double-line"></i>Construction de route.</li>
                  <li><i class="ri-check-double-line"></i>Construction de pont.</li>
                </ul>
                <p>
                @foreach($activite1 as $activite1s) {{ $activite1s->description }}@endforeach
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('frontend/img/ingenieur.png')}}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <br><br>
                <h3>Estimation de construction</h3>               
                <p class="font-italic">
                Rower construction estime votre depense durant la realisation comme :  
                </p>
                <ul>
                <li><i class="ri-check-double-line"></i>Devis de construction de bureaux.</li>
                  <li><i class="ri-check-double-line"></i>Devis de construction de batiment.</li>
                  <li><i class="ri-check-double-line"></i>Devis de construction de bâtiment industriel.</li>
                  <li><i class="ri-check-double-line"></i>Devis de construction de route.</li>
                  <li><i class="ri-check-double-line"></i>Devis de construction de pont.</li>
                </ul>
                <p>
                @foreach($activite2 as $activite2s) {{ $activite2s->description }}@endforeach
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('frontend/img/lanceur.png')}}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <br><br>
                <h3>Production du plan</h3>
                <p class="font-italic">
                Rower construction produire differente type de plan comme :  
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Plan de maison</li>
                  <li><i class="ri-check-double-line"></i> Plan de pont</li>
                  <li><i class="ri-check-double-line"></i> Plan de bureau</li>
                  <li><i class="ri-check-double-line"></i> Plan de parc</li>
                </ul>
                <p>
                @foreach($activite3 as $activite3s) {{ $activite3s->description }}@endforeach
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="{{ asset('frontend/img/conducteur.png')}}" alt="" class="img-fluid">
                
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <br><br>
                <h3>Cree modèles</h3>                
                <p class="font-italic">
                Rower construction cree differente type de modèle comme : 
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Modèle de maison</li>
                  <li><i class="ri-check-double-line"></i> Modèle de pont</li>
                  <li><i class="ri-check-double-line"></i> Modèle de bureau</li>
                  <li><i class="ri-check-double-line"></i> Modèle de parc</li>
                </ul>
                <p>
                @foreach($activite4 as $activite4s) {{ $activite4s->description }}@endforeach
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                
                <img src="{{ asset('frontend/img/gestion.png')}}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Activites Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
      <div class="section-title">
          <h2>Performants et Economiques</h2>
          <p>La satisfaction des clients est notre priorité</p>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="icofont-computer"></i>
              <h4><a href="#">Materiaux</a></h4>
              <p>Nos construction  energie positive sont équipées des matériaux trés performants 
                en matière d'economie d'énergie </p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-chart-bar-graph"></i>
              <h4><a href="#">Délais</a></h4>
              <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-image"></i>
              <h4><a href="#">Qualité</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-settings"></i>
              <h4><a href="#">Prix</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>
        
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Réalisations Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Réalisations</h2>
          <p>Echantillon de nos travails recente</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Tous</li>
              <li data-filter=".filter-app">Réalisation</li>
              <li data-filter=".filter-card">Modèle</li>
              
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
        @foreach($realisation as $realisations)
          <div class="col-lg-4 col-md-4 portfolio-item filter-app">
            <div class="portfolio-wrap"              
               style=" height:200px;
                background-image:url('{{asset('uploads/realisations/'.$realisations->imageRealisation)}}');
                background-repeat:no-repeat;
                background-size:cover;
                backgroud-position:center;"
              >
              <div class="portfolio-info">
                <h4>{{ $realisations->nomRealisation}}</h4>
                <p>{{ $realisations->ville}} {{ $realisations->region}}</p>
                <div class="portfolio-links">
                  <a href="{{asset('uploads/realisations/'.$realisations->imageRealisation)}}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="{{route('realisation.sow', ['id'=>$realisations->id])}}" data-gall="portfolioDetailsGallery"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        @foreach($modele as $modeles)
        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap"
            style=" height:200px;
                background-image:url('{{asset('uploads/modeles/'.$modeles->imageIllustration)}}');
                background-repeat:no-repeat;
                background-size:cover;
                backgroud-position:center;"
              >              
              <div class="portfolio-info">
                <h4>{{ $modeles->nomModele}}</h4>
                <p>{{ $modeles->montantDeOperation}} Ar</p>
                <div class="portfolio-links">
                  <a href="{{asset('uploads/modeles/'.$modeles->imageIllustration)}}" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="{{route('modele.detail', ['id'=>$modeles->id])}}" data-gall="portfolioDetailsGallery"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>

      </div>
    </section><!-- End Réalisations Section -->

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
    
  </main><!-- End #main -->

<!--/ script sweet alert -->
<script src="{{asset('frontend/js/sweetalert.js')}}"></script>
      <script>          
            @if(Session::has('success3'))
            // alert('{{ Session::get('success') }}');	
              swal({
              title: "Reussie!",
              text: "{{ Session::get('success3') }}",
              icon: "success",
              button: "Ok",
              });
            @endif
        
      </script>


@endsection()