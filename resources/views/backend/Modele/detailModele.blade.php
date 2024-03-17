@extends('layouts.backend.menu')

@section('content')
<section id="main-content">
      <section class="wrapper site-min-height">
      
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
             
              <!-- /col-md-4 -->
              <div class="col-md-8 profile-text">
                <h3>{{ $modeles->nomModele}}</h3>
                
                <p>{{ $modeles->descriptionModele}}</p>
                <br>
                <p> Montant de l'operation a partir de {{ $modeles->montantDeOperation}} Ar</p>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="{{asset('uploads/modeles/'.$modeles->imageIllustration)}}"></p>
                  <p>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Ajout distribution</button> 
                  </p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          @foreach($distrubitions as $distrubition) 
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Distrubition</a>
                  </li>
                  
                  <li>
                    <a data-toggle="tab" href="#edit">Edit Distrubition</a>
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
                          <h4>Information de la modele</h4>
                          <div class="recent-activity">
                            <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                            <div class="activity-panel">
                              <h5>  {{ $distrubition->cuisineSepare}}</h5>
                              <p>Cuisine séparée</p>
                            </div>
                            <div class="activity-icon bg-theme02"><i class="fa fa-trophy"></i></div>
                            <div class="activity-panel">
                            <h5>{{ $distrubition->garage}}</h5>
                              <p>Garage</p>
                            </div>
                            <div class="activity-icon bg-theme04"><i class="fa fa-rocket"></i></div>
                            <div class="activity-panel">
                            <h5>{{ $distrubition->dimension}} m <sup>2</sup> </h5>
                              <p>Dimension</p>
                            </div>
                          </div>
                          <!-- /recent-activity -->
                        </div>
                        <!-- /detailed -->
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Distrubition</h4>
                        <div class="row centered mt mb">
                          <div class="col-sm-4">
                            <h1><i class="fa fa-money"></i></h1>
                            <h3>{{ $distrubition->chambre}}</h3>
                            <h6>Chambre(s)</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-trophy"></i></h1>
                            <h3>{{ $distrubition->toilette}}</h3>
                            <h6>Toilette(s)</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-shopping-cart"></i></h1>
                            <h3>{{ $distrubition->salleDeBain}}</h3>
                            <h6>Salle(s) de bains</h6>
                          </div>
                        </div>
                        <!-- /row -->
                        <h4>Image illustration</h4>
                        <div class="row centered mb">
                          <ul class="my-friends">
                            <li>
                               <div class="friends-pic"><img  width="400" height="270" style="margin-left:80px;" src="{{asset('uploads/modeles/'.$modeles->imageIllustration)}}"></div>
                            </li>
                            
                          </ul>
                          
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
                        <h4 class="mb">Information de la distrubition</h4>
                        <form class="form-horizontal style-form" method="post" action="{{ route ('modele.distrubition')}}" enctype="multipart/form-data">
                           {{ csrf_field() }} 
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Dimension</label>
                            <div class="col-lg-10">
                              <input type="text"  id="c-name" class="form-control" name="dimension" value="{{ $distrubition->dimension}}">
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Chambre</label>
                            <div class="col-lg-10">
                              <input type="text" placeholder=" " id="lives-in" class="form-control" name="chambre" value="{{ $distrubition->chambre}}">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">toilette</label>
                            <div class="col-lg-10">
                              <input rows="10" cols="30" class="form-control" id="" name="toilette" value="{{ $distrubition->toilette}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Salle de bain</label>
                            <div class="col-lg-10">
                              <input rows="10" cols="30" class="form-control" id="" name="salleDeBain" value="{{ $distrubition->salleDeBain}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Cuisine séparée</label>
                            <div class="col-lg-10">
                              <input rows="10" cols="30" class="form-control" id="" name="cuisineSepare" value="{{ $distrubition->cuisineSepare}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Garage</label>
                            <div class="col-lg-10">
                              <input rows="10" cols="30" class="form-control" id="" name="garage" value="{{ $distrubition->garage}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Valider</button>
                              <button class="btn btn-theme04" type="button">retour</button>
                            </div>
                          </div>
                        </form>
                      </div>
                     
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
          @endforeach 
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
        
      </section>
      <!-- /wrapper -->
    </section>
 
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Ajout distrubition de ce modele</h4>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal style-form" method="post" action="{{ route ('modele.distrubition')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}   <div class="form-group">
                        <label class="col-lg-3 control-label">Modele </label>
                            <div class="col-lg-8">
                                <select name="modele_id" id="modele_id" class="form-control">
                                   
                                    @foreach($types as $type)
                                    @if( $type->id == $modeles->id)
                                    <option value="{{ $type->id}}" selected > {{ $type->nomModele }}</option>
                                    
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                      <div class="form-group">
                            <label class="col-lg-3 control-label">Dimension (en m<sup>2</sup>) </label>
                            <div class="col-lg-8">
                            <input type="text" class="form-control" name="dimension">
                              @if ($errors->has('dimension'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('dimension') }}</strong>
                                </span>
                              @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">chambre </label>
                            <div class="col-lg-8">
                            <input type="text" class="form-control" name="chambre">
                              @if ($errors->has('chambre'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('chambre') }}</strong>
                                </span>
                              @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Toilette(s) </label>
                            <div class="col-lg-8">
                            <input type="text" class="form-control" name="toilette">
                              @if ($errors->has('toilette'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('toilette') }}</strong>
                                </span>
                              @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Salle(s) de bains</label>
                            <div class="col-lg-8">
                            <input type="text" class="form-control" name="salleDeBain">
                              @if ($errors->has('salleDeBain'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('salleDeBain') }}</strong>
                                </span>
                              @endif
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-lg-3 control-label">Cuisine séparée </label>
                            <div class="col-lg-8">
                            <select class="form-control" name="cuisineSepare">
                                <option>Oui</option>
                                <option>Non</option>
                                <option>En option</option>
                            </select>
                            
                                @if ($errors->has('cuisineSepare'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('cuisineSepare') }}</strong>
                                </span>
                                @endif
                            </div>
                       </div>
                       <div class="form-group">
                        <label class="col-lg-3 control-label">Garage</label>
                            <div class="col-lg-8">
                            <select class="form-control" name="garage">
                                <option>Oui</option>
                                <option>Non</option>
                                <option>En option</option>
                            </select>
                            
                                @if ($errors->has('garage'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('garage') }}</strong>
                                </span>
                                @endif
                            </div>
                       </div>
                   
                    <form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Enregistre</button>
                    </div>
                  </div>
                </div>
              </div>

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

@endsection()