@extends('layouts.backend.menu')

@section('content')

<section id="main-content">
      <section class="wrapper site-min-height">
      @foreach($rowers as $rower)
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">              
              <div class="col-md-8 profile-text">
                <h3>{{ $rower->nom}}</h3>
                <h6> est cree le {{ $rower->date}}</h6>
                <p>{{ $rower->description}}</p>
               
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="{{ asset('backend/img/miraygeek.jpg')}}" class="img-circle"></p>                 
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Profile</a>
                  </li>                 
                  <li>
                    <a data-toggle="tab" href="#edit">Edit Profile</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-6">
                        
                        <div class="detailed mt">
                          <h4>Information de la societe</h4>
                          <div class="recent-activity">
                            <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                            <div class="activity-panel">
                              <h5>NOM</h5>
                              <p>{{ $rower->nom}}.</p>
                            </div>
                            <div class="activity-icon bg-theme02"><i class="fa fa-trophy"></i></div>
                            <div class="activity-panel">
                            <h5>SIEGE</h5>
                              <p>{{ $rower->siege}}.</p>
                            </div>
                            <div class="activity-icon bg-theme04"><i class="fa fa-rocket"></i></div>
                            <div class="activity-panel">
                            <h5>Description</h5>
                              <p>{{ $rower->description}}.</p>
                            </div>
                          </div>
                          <!-- /recent-activity -->
                        </div>
                        <!-- /detailed -->
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                      <h4>LOGO</h4>
                        <div class="row centered mb">
                          <ul class="my-friends">
                            <li>
                               <div class="friends-pic"><img  width="400" height="150" style="margin-left:80px;" src="{{asset('uploads/societe/'.$rower->logo)}}"></div>
                            </li>
                            
                          </ul>
                          
                        </div>
                        <!-- /row -->
                        <h4>Statistiques</h4>
                        <div class="row centered mt mb">
                          <div class="col-sm-4">
                              <h1><i class="fa fa-trophy"></i></h1>
                              <h3>@foreach($count_realisation as $count) {{ $count->count }} @endforeach</h3>
                              <h6>NOMBRE DES REALISATIONS</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-maxcdn"></i></h1>
                            <h3>@foreach($count_modele as $count) {{ $count->count }} @endforeach</h3>
                            <h6>NOMBRE DES MODELES</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-user"></i></h1>
                            <h3>@foreach($count_membre as $count) {{ $count->count }} @endforeach</h3>
                            <h6>NOMBRE DES MEMBRES</h6>
                          </div>
                         
                        </div>
                        <!-- /row -->
                        
                        
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                 
                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Information de la societe</h4>
                        <form class="form-horizontal style-form" method="post" action="{{ route ('rower.update')}}" enctype="multipart/form-data">
                           {{ csrf_field() }} 
                        
                          <div class="form-group">
                            <label class="col-lg-2 control-label"> Logo</label>
                            <div class="col-lg-6">
                            <input type="file" class="form-control" value="{{ $rower->logo}}" accept="image/*" name="imageMembre" id="file" onchange="loadFile(event)" style="display:none;">
                    
                              <div style="display: inline-block;
                                    margin-bottom: 5px;
                                    overflow: hidden;
                                    text-align: center;
                                    vertical-align: middle;
                                    width:180px;
                                    height:70px;
                                    border: 1px solid #eff2f7;
                                    "> 
                                    <p><img id="output" width="150" src="{{asset('uploads/societe/'.$rower->logo)}}"/></p>
                            </div>
                            <p><label for="file" style="cursor: pointer;" class="btn btn-info"> <i class="fa fa-camera"></i> Telecharge l'image </label></p>
                    
                            </div>
                          </div>                     

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nom</label>
                            <div class="col-lg-10">
                              <input type="text"  id="c-name" class="form-control" name="nom" value="{{ $rower->nom}}">
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Date</label>
                            <div class="col-lg-10">
                              <input type="text" placeholder=" " id="lives-in" class="form-control" name="date" value="{{ $rower->date}}">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Description</label>
                            <div class="col-lg-10">
                               <textarea class="form-control " id="description" name="description">{{ $rower->description}}</textarea>
                              
                            </div>
                          </div>
                       
                        <h4 class="mb">Contact de la societe</h4>
                        
                          <div class="form-group">
                              <label class="col-lg-2 control-label">Siege</label>
                              <div class="col-lg-10">
                                <input type="text" placeholder=" " id="lives-in" class="form-control" name="siege" value="{{ $rower->siege}}">
                              </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">email</label>
                            <div class="col-lg-10">
                              <input type="email" placeholder=" " id="lives-in" class="form-control" name="mail" value="{{ $rower->mail}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Telephone</label>
                            <div class="col-lg-10">
                              <input type="text" placeholder=" " id="lives-in" class="form-control" name="telephone" value="{{ $rower->telephone}}">
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Modifier</button>
                              
                            </div>
                          </div>
                        </form>
                     
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
        <script src="{{asset('backend/lib/sweetalert.js')}}"></script>
        <script>          
          @if(Session::has('modifier'))          	
            swal({
            title: "Reussie!",
            text: "{{ Session::get('modifier') }}",
            icon: "success",
            button: "Ok",
            });
          @endif      
    </script>
        @endforeach
      </section>
      <!-- /wrapper -->
    </section>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
  <script>
    $('.contact-map').click(function() {

      //google map in tab click initialize
      function initialize() {
        var myLatlng = new google.maps.LatLng(40.6700, -73.9400);
        var mapOptions = {
          zoom: 11,
          scrollwheel: false,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Dashio Admin Theme!'
        });
      }
      google.maps.event.addDomListener(window, 'click', initialize);
    });
  </script>

<script>
      var loadFile = function(event){
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
      };
     
  </script>
    @endsection()