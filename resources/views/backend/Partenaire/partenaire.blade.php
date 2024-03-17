@extends('layouts.backend.menu')

@section('content')
<section id="main-content">
      <section class="wrapper">
      <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Gerer partenaire</h>
            </div>
            
            </div>
        </div><!-- /.container-fluid -->
      </section>
      <hr>
        <div class="row mt">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
              <center><h4> Liste de tous les activités disponibles</h4></center>         
              
              <table class="table table-striped table-advance table-hover">               
                <hr>
                <thead>
                  <tr>
                    <th> Nom partenaire</th>
                    <th class="hidden-phone">Logo</th>                    
                    
                    <th><i class=" fa fa-edit"></i> Action</th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($partenaires as $partenaire)
                  <tr>
                     <td>{{ $partenaire->nomPartenaire}}</td>
                     <td class="hidden-phone"><img src="{{asset('uploads/partenaires/'.$partenaire->logoPartenaire)}}"  alt="Avatar"  width="50"></td>
                    
                    <td>
                      
                    <button class="btn btn-primary btn-xs">
                         <a href="" style="color:white;"
                            <i class="fa fa-pencil"></i>
                         </a>
                    </button>                   
                      <button class="btn btn-danger btn-xs">
                          <a href="{{ route ('partenaire.supprimer', ['id'=>$partenaire->id]) }}" style="color:white;">
                             <i class="fa fa-trash-o"></i>
                          </a>
                       </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
               
              </table>
              <hr>
              <div class="text-center">
              {{ $partenaires->links() }}
              </div>
               
            </div>
            <!--/showback -->
     
          </div>
          <!-- /col-lg-6 -->
          <div class="col-lg-6 col-md-8 col-sm-12">
            <!--  ALERTS EXAMPLES -->
            <div class="showback">
              <center> <h4> Ajout nouvelle partenaire</h4></center>
              <div id="message"></div>
              <hr>
            <form class="contact-form php-mail-form" role="form" action="{{ route('partenaire.Ajout')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <br> 
              <div class="form-group">
                <label>Nom </label>
                
                    <input type="texte" name="nomPartenaire" class="form-control" id="contact-name" placeholder="Entre le nom de la partenaire" data-rule="minlen:4"  >
                    @if ($errors->has('nomPartenaire'))                    
                    <span class="help-block ">
                        <strong style="color:#a94442;">{{ $errors->first('nomPartenaire') }}</strong>
                        </span>
                    @endif
                </div>
              
              <br> 
              <div class="form-group">
                    <label for="logo" class="col-sm-2 col-sm-2 control-label" >Logo</label>
                    <div class="col-sm-10">
                    <input type="file" class="form-control" accept="image/*" name="logoPartenaire" id="file" onchange="loadFile(event)" style="display:none;">
                    
                    <div style="display: inline-block;
                            margin-bottom: 5px;
                            overflow: hidden;
                            text-align: center;
                            vertical-align: middle;
                            width:150px;
                            height:100px;
                            border: 1px solid #ddd;
                            "> 
                            <p><img id="output" width="150" /></p>
                    </div>
                    <p><label for="file" style="cursor: pointer;" class="btn btn-info"> <i class="fa fa-camera"></i> Telecharge l'image </label></p>
                    
                    @if ($errors->has('logoPartenaire'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('logoPartenaire') }}</strong>
                       </span>
                    @endif

                    @if(Session::has('error'))
                    <span class="help-block ">
                        <strong style="color:#a94442;">{{Session::get('error') }}</strong>
                    </span>                      
                    @endif
                    </div>
                      
                </div>
          
              <br>
              <hr>
              <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary">Valider</button>
              </div>

            </form>
            </div>
            <!-- /showback -->
        
          </div>
          <!-- /col-lg-6 -->
        </div>
        <!--/ row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!--/ script sweet alert -->
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
            swal({
              title: "Avez_vous sure?",
              text: "de supprimer cette activite!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })      
            .then((willDelete) => {
              @if(Session::has('supprimer'))
              if (willDelete) {
                swal({
                  title: "Reussie!",
                  text: "{{ Session::get('supprimer') }}",
                  icon: "success",
                  button: "Ok",
                });
                @endif         
              }     
              else {
                swal("vous ne supprime pas cette activite!");
              }
            });
        
      </script>
      <script>
          
          @if(Session::has('modifier'))
          // alert('{{ Session::get('success') }}');	
            swal({
            title: "Reussie!",
            text: "{{ Session::get('modifier') }}",
            icon: "success",
            button: "Ok",
            });
          @endif
      
    </script>
   
@endsection()
<!--script for this page-->
<script type="text/javascript" src="{{asset('backend/lib/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/lib/gritter-conf.js')}}"></script>
<script>
      var loadFile = function(event){
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
      };
     
  </script>

