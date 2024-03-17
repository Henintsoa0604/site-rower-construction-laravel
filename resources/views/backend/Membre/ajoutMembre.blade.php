@extends('layouts.backend.menu')

@section('content')
<section id="main-content">
      <section class="wrapper">
      <h3><a href="{{route('home')}}" style="color:#797979;">Accueil</a>  
        <i class="fa fa-angle-right"></i><a href="{{route('membre')}}" style="color:#797979;">Gerer membre</a>
        <i class="fa fa-angle-right"></i><a href="{{route('home')}}" style="color:#797979;">Ajout nouveau membre</a></h3>
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><center>AJOUT NOUVEAU MEMBRE</center> </h4>  
              <hr>            
              <form class="form-horizontal style-form" method="post" action="{{ route('membre.Action')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <br>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-2 control-label" style="margin-left:10%">Matricule</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="identifiant" placeholder="Entrez le matricule de cet nouveau membre">
                    @if ($errors->has('identifiant'))                    
                                <span class="help-block ">
                                   <strong style="color:#a94442;">{{ $errors->first('identifiant') }}</strong>
                                </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-2 control-label" style="margin-left:10%">Nom</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nomMembre" placeholder="Entrez le nom de cet nouveau membre">
                    @if ($errors->has('nomMembre'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('nomMembre') }}</strong>
                       </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-2 control-label" style="margin-left:10%">Prenom</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="prenom" placeholder="Entrez le prenom de cet nouveau membre">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-2 control-label" style="margin-left:10%">Poste</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="poste" placeholder="Entrez le propre post de cet nouveau membre">
                    @if ($errors->has('poste'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('poste') }}</strong>
                       </span>
                    @endif
                  </div>
                </div>
                
              <div class="form-group">
                    <label for="logo" class="col-sm-1 col-sm-2 control-label" style="margin-left:10%">Image</label>
                    <div class="col-sm-8">
                    <input type="file" class="form-control" accept="image/*" name="imageMembre" id="file" onchange="loadFile(event)" style="display:none;">
                    
                    <div style="display: inline-block;
                            margin-bottom: 5px;
                            overflow: hidden;
                            text-align: center;
                            vertical-align: middle;
                            width:150px;
                            height:150px;
                            border: 1px solid #ddd;
                            "> 
                            <p><img id="output" width="150" /></p>
                    </div>
                    <p><label for="file" style="cursor: pointer;" class="btn btn-info"> <i class="fa fa-camera"></i> Telecharge l'image </label></p>
                    
                    @if ($errors->has('imageMembre'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('imageMembre') }}</strong>
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
                  <label class="col-sm-1 col-sm-2 control-label" style="margin-left:10%">Description</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="descriptionMembre"></textarea>
                    @if ($errors->has('descriptionMembre'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('descriptionMembre') }}</strong>
                       </span>
                    @endif
                  </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Valider</button>
                     <a href="{{route('membre')}}"> <button class="btn btn-theme04" type="button">Retour</button></a>
                    </div>
                  </div>
           
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
       
       
        
      </section>
      <!-- /wrapper -->
    </section>

    <!--script for this page-->
  <script src="{{asset('backend/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!--custom switch-->
  <script src="{{asset('backend/lib/bootstrap-switch.js')}}"></script>
  <!--custom tagsinput-->
  <script src="{{asset('backend/lib/jquery.tagsinput.js')}}"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/date.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
  <script src="{{asset('backend/lib/form-component.js')}}"></script>
 
  <script src="{{asset('backend/lib/sweetalert.js')}}"></script>
      <script>
          
            @if(Session::has('success'))
            // alert('{{ Session::get('success') }}');	
              swal({
              title: "Reussie!",
              text: "{{ Session::get('success') }}",
              icon: "success",
              button: "Ok",
              });
            @endif
        
      </script>
    
  <script>
      var loadFile = function(event){
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
      };
     
  </script>
  


@endsection()