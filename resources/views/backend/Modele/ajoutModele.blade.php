@extends('layouts.backend.menu')

@section('content')
<section id="main-content">
      <section class="wrapper">
        <h3> Form Components</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><center>AJOUT NOUVEAU MODELE</center> </h4>              
              <form class="form-horizontal style-form" method="post" action="{{ route('modele.Action')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nom modele</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomModele" >
                    @if ($errors->has('nomModele'))                    
                                <span class="help-block ">
                                   <strong style="color:#a94442;">{{ $errors->first('nomModele') }}</strong>
                                </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Montant d'operation </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="montantDeOperation">
                    @if ($errors->has('montantDeOperation'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('montantDeOperation') }}</strong>
                       </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type de construction </label>
                  <div class="col-sm-10">
                  <select name="construction_id" id="construction_id" class="form-control">
                           @foreach($types as $type)
                             <option value="{{ $type->id}}"> {{ $type->nom_Type }}</option>
                           @endforeach
                        </select>
                  </div>
                </div>
                
              <div class="form-group">
                    <label for="logo" class="col-sm-2 col-sm-2 control-label">Image d'illustration</label>
                    <div class="col-sm-10">
                    <input type="file" class="form-control" accept="image/*" name="imageIllustration" id="file" onchange="loadFile(event)" style="display:none;">
                    
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
                    
                    @if ($errors->has('imageIllustration'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('imageIllustration') }}</strong>
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
                  <label class="col-sm-2 col-sm-2 control-label">Description Modele</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="descriptionModele"></textarea>
                    @if ($errors->has('descriptionModele'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('descriptionModele') }}</strong>
                       </span>
                    @endif
                  </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Valider</button>
                      <button class="btn btn-theme04" type="button">Annuller</button>
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

  <script>
      var loadFile = function(event){
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
      };
     
  </script>
  


@endsection()