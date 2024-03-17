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
              <h2 class="animate__animated animate__fadeInDown">Vous aussi vous avez un projet de construction économe  ?</h2>
              <p class="animate__animated animate__fadeInUp"> Nos conseillers restent disponibles pour vous accompagner par téléphone ou email.</p>
              <a href="" class="btn-get-started animate__animated animate__fadeInUp scrollto" data-toggle="modal" data-target="#myModal">Demande d'information</a>
              
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
          <div class="col-lg-6">
            <h2>@foreach($rowers as $rower) {{ $rower->nom }} @endforeach</h2>
            <h3>La satisfaction des clients est notre priorité</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            En tant que constructeur, Rower a conçu des differentes 
            type de construction.
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

    <!-- ======= membre Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Membre</h2>
          <p>Nos Membres </p>
        </div>

        <div class="row">
        <br><br>
        @foreach($membres as $membre)
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('uploads/membre/'.$membre->imageMembre)}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>{{ $membre->nomMembre}} {{ $membre->prenom}}</h4>
                <span>{{ $membre->poste}}</span>
                <p>{{ $membre->descriptionMembre}}</p>
               
                
              </div>
            </div>
            <br>
          </div>
          
          @endforeach
         


        </div>

      </div>
    </section><!-- End membre Section -->

     <!-- ======= Activite Section ======= -->
     <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>Activites</h2>
          <p>Nos differentes activites</p>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">
                @foreach($activite1 as $activite1s) {{ $activite1s->nom }} @endforeach
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">
                @foreach($activite2 as $activite2s) {{ $activite2s->nom }} @endforeach
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">
                @foreach($activite3 as $activite3s) {{ $activite3s->nom }} @endforeach
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">
                @foreach($activite4 as $activite4s) {{ $activite4s->nom }} @endforeach
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Tous differents type de construction</h3>
                    <p class="font-italic">comme batiment,bureau,.....</p>
                    <p>@foreach($activite1 as $activite1s) {{ $activite1s->description }}@endforeach</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ asset('frontend/img/construction.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Nous construisons des modeles</h3>
                    <p class="font-italic">Maisons basse,maison a etage...</p>
                    <p>@foreach($activite2 as $activite2s) {{ $activite2s->description }}@endforeach</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ asset('frontend/img/modele.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="font-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                    <p>@foreach($activite3 as $activite3s) {{ $activite4s->description }} @endforeach</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ asset('frontend/img/features-4.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="font-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>@foreach($activite4 as $activite4s) {{ $activite4s->description }} @endforeach</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ asset('frontend/img/features-5.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="font-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/features-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End activites Section -->

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

    <!-- ======= Our statistique Section ======= -->
    <section id="skills" class="skills">
      <div class="container">

        <div class="section-title">
          <h2>Statistique</h2>
          <p>statistique de nos travails</p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill">Nombre de nos realisations <i class="val">@foreach($countRealisations as $count) {{ $count->count }} @endforeach</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
             <br>
            <div class="progress">
              <span class="skill">Nombre de nos modeles <i class="val">@foreach($countModeles as $count) {{ $count->count }} @endforeach</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            

          </div>

          <div class="col-lg-6">

          <div class="progress">
              <span class="skill">Nombre de nos membres <i class="val">@foreach($countMembres as $count) {{ $count->count }} @endforeach</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <br>
            <div class="progress">
              <span class="skill">Nombre de nos information <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
           
            


          </div>

        </div>

      </div>
    </section><!-- End statistique Section -->

 @include('frontend/information');

</main>

@endsection()