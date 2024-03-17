@extends('layouts.backend.menu')

@section('content')
<section id="main-content">
      <section class="wrapper">
      <h3><a href="{{route('home')}}" style="color:#797979;">Accueil</a>  
        <i class="fa fa-angle-right"></i><a href="{{route('blog')}}" style="color:#797979;">Gerer blog</a>
        <i class="fa fa-angle-right"></i><a href="{{route('blog.ajout')}}" style="color:#797979;">Ajout blog</a></h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><center>AJOUT NOUVEAU BLOG</center> </h4>              
              <form class="form-horizontal style-form" method="post" action="{{ route('blog.action')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Titre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="titre" >
                    @if ($errors->has('titre'))                    
                                <span class="help-block ">
                                   <strong style="color:#a94442;">{{ $errors->first('titre') }}</strong>
                                </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Categories </label>
                  <div class="col-sm-10">
                    <select class="form-control" name="categorieBlog">
                        <option>Travail</option>
                        <option>Education</option>
                        <option>Publication</option>
                        <option>Creation</option>
                        <option>Journal</option>
                    </select>
                    
                        @if ($errors->has('categorieBlog'))                    
                        <span class="help-block ">
                            <strong style="color:#a94442;">{{ $errors->first('categorieBlog') }}</strong>
                        </span>
                        @endif
                  </div>
                </div>             
              <div class="form-group">
                    <label for="logo" class="col-sm-2 col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                    <input type="file" class="form-control" accept="image/*" name="imageBlog" id="file" onchange="loadFile(event)" style="display:none;">
                    
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
                    
                    @if ($errors->has('imageBlog'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('imageBlog') }}</strong>
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
                  <label class="col-sm-2 col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="descriptionBlog"></textarea>
                    @if ($errors->has('descriptionBlog'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('descriptionBlog') }}</strong>
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

@endsection()