@extends('layouts.backend.menu')

@section('content')
 <!--main content start-->
 <section id="main-content">
      <section class="wrapper site-min-height">
      
      <h3>Accueil <i class="fa fa-angle-right"></i> Gerer realisation <i class="fa fa-angle-right"></i> modifier</h3>
        
        <div class="row mt">          
          <div class="col-lg-12 mt">
            <div class="row content-panel">
            <h4 class="mb"><center>Modifier realisation numero : {{ $realisations->id}}</center> </h4>
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Realisation</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map">Colaborateur</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Lieu</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <form class="form-horizontal style-form" method="post" action="{{ route ('realisation.update', ['id'=>$realisations->id]) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}              
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                  {{ csrf_field() }} 
                    <div class="row">  
                        <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Information sur la realisation</h4>                  
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nom realisation</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="nomRealisation" value="{{ $realisations->nomRealisation}}" >
                                @if ($errors->has('nomRealisation'))                    
                                            <span class="help-block ">
                                            <strong style="color:#a94442;">{{ $errors->first('nomRealisation') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Montant d'operation </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="montantRealisation" value="{{ $realisations->montantRealisation}}">
                                @if ($errors->has('montantRealisation'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('montantRealisation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Type de construction </label>
                            <div class="col-lg-8">
                            <select name="type_id" id="type_id" class="form-control">
                                @foreach($types as $type)
                                @if( $type->id == $realisations->type_id)
                                <option value="{{ $type->id}}" selected > {{ $type->nom_Type }}</option>
                                @else
                                <option value="{{ $type->id}}"> {{ $type->nom_Type }}</option>
                                @endif
                           @endforeach
                                    </select>
                            </div>
                        </div>
                
                        <div class="form-group">
                                <label for="logo" class="col-lg-3 control-label">Image d'illustration</label>
                                <div class="col-sm-8">
                                <input type="file" class="form-control" accept="image/*" value="{{ $realisations->imageRealisation}}" name="imageRealisation" id="file" onchange="loadFile(event)" style="display:none;">
                                
                                <div style="display: inline-block;
                                        margin-bottom: 5px;
                                        overflow: hidden;
                                        text-align: center;
                                        vertical-align: middle;
                                        width:150px;
                                        height:150px;
                                        border: 1px solid #ddd;
                                        "> 
                                        <p><img id="output" width="150" src="{{asset('uploads/realisations/'.$realisations->imageRealisation)}}"/></p>
                                </div>
                                <p><label for="file" style="cursor: pointer;" class="btn btn-info"> <i class="fa fa-camera"></i> Telecharge l'image </label></p>
                                
                                @if ($errors->has('imageRealisation'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('imageRealisation') }}</strong>
                                </span>
                                @endif

                                @if(Session::has('error'))
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{Session::get('error') }}</strong>
                                </span>                      
                                @endif
                                </div>                                
                            </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="descriptionRealisation" value="{{ $realisations->descriptionRealisation}}">
                                @if ($errors->has('descriptionRealisation'))                    
                                <span class="help-block ">
                                    <strong style="color:#a94442;">{{ $errors->first('descriptionRealisation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-10">                             
                              
                              <button class="btn btn-theme">Suivant</button>
                            </div>
                          </div>
                    
                      </div>
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="contact" class="tab-pane">
                    <div class="row">
                    {{ csrf_field() }} 
                    <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Information sur le colaborateur</h4>
                        <br>                  
                        <div class="form-group">
                            <label class="col-lg-3 control-label">societe colaborateur</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="societeColaborateur" value="{{ $realisations->societeColaborateur}}">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Maitre d'ouvrage</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="maitreOuvrage" value="{{ $realisations->maitreOuvrage}}">
                                @if ($errors->has('maitreOuvrage'))                    
                                            <span class="help-block ">
                                            <strong style="color:#a94442;">{{ $errors->first('maitreOuvrage') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">L'architecte</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="architecte" value="{{ $realisations->architecte}}">
                                @if ($errors->has('architecte'))                    
                                            <span class="help-block ">
                                            <strong style="color:#a94442;">{{ $errors->first('architecte') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-10">                              
                              <button class="btn btn-theme04" >Retour</button>
                              <button class="btn btn-theme" >Suivant</button>

                                 
                            </div>
                          </div>
                        
                    </div> 
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    <div class="row">
                    {{ csrf_field() }} 
                    <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Information sur le lieu </h4>
                                         
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Province</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="province" value="{{ $realisations->province}}">
                                @if ($errors->has('province'))                    
                                            <span class="help-block ">
                                            <strong style="color:#a94442;">{{ $errors->first('province') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Region</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="region" value="{{ $realisations->region}}">
                                @if ($errors->has('region'))                    
                                            <span class="help-block ">
                                            <strong style="color:#a94442;">{{ $errors->first('region') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">District</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="district" value="{{ $realisations->district}}">
                                @if ($errors->has('district'))                    
                                            <span class="help-block ">
                                            <strong style="color:#a94442;">{{ $errors->first('district') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ville</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="ville" value="{{ $realisations->ville}}">
                                @if ($errors->has('ville'))                    
                                            <span class="help-block ">
                                            <strong style="color:#a94442;">{{ $errors->first('ville') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-10">                              
                              <button class="btn btn-theme04" type="button">Retour</button>
                              <button class="btn btn-theme" type="submit">Terminer</button>
                            </div>
                          </div>
                    </div>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              </form>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
      
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
@endsection()
<!--script for this page-->
  <!-- MAP SCRIPT - ALL CONFIGURATION IS PLACED HERE - VIEW OUR DOCUMENTATION FOR FURTHER INFORMATION -->
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