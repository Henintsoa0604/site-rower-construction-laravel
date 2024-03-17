@extends('layouts.backend.menu')

@section('content')
<section id="main-content">
      <section class="wrapper">
      <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h3>Gerer type de construction </h3>                    
                </div>                   
            </div>
        </div><!-- /.container-fluid -->
      </section>
      <hr>
        <div class="row mt">
          <div class="col-lg-8 col-md-6 col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback"> 
               <br>
                 <div class="col-sm-8">
                      <h4> Les type de constructions disponibles</h4> 
                  </div>
                  
                  <div class="col-sm-4">
                    <button class="btn btn-theme" data-toggle="modal" data-target="#myModal">
                       <i class="fa fa-plus"></i> Ajout nouvelle construction
                    </button> 
                  </div>             
             
              <table class="table table-striped table-advance table-hover">               
                <hr>
                <thead>
                  <tr>
                    <th> Numero</th>
                    <th class="hidden-phone">Nom type construction</th>                    
                    
                    <th><i class=" fa fa-edit"></i> Action</th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($constructions as $construction)
                  <tr>
                     <td>{{ $construction->id}}</td>
                     <td>{{ $construction->nom_Type}}</td>
                    
                    <td>
                      
                    <button class="btn btn-primary btn-xs">
                         <a href="{{ route ('construction.editer', ['id'=>$construction->id]) }}" style="color:white;"
                            <i class="fa fa-pencil"></i>
                         </a>
                    </button>                   
                    <button class="btn btn-danger btn-xs">
                         <a href="{{ route ('construction.supprimer', ['id'=>$construction->id]) }}" style="color:white;">
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
              {{ $constructions->links() }}
              </div>
               
            </div>
            <!--/showback -->
     
          </div>
          <!-- /col-lg-6 -->
          <div class="col-lg-4 col-md-8 col-sm-12">
            <!--  ALERTS EXAMPLES -->
            <div class="showback">
              <center> <h4> Ajout nouvelle construction</h4></center>
              <div id="message"></div>
             
              <form class="form-horizontal style-form" method="Post" action="{{ route('type_constructionAjoutAction')}}">
              {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type de Construction</label>
                  <div class="col-sm-10">
                    <input type="text" name="nom_Type" id="nom_Type" class="form-control">
                        @if ($errors->has('nom_Type'))
                                <span class="help-block">
                                   <strong style="color:red;">{{ $errors->first('nom_Type') }}</strong>
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
            swal({
            title: "Reussie!",
            text: "{{ Session::get('modifier') }}",
            icon: "success",
            button: "Ok",
            });
          @endif      
    </script>
     <script>          
         @if($errors->has('nom_Type'))                               
            swal({
                title: "Alert!",
                text: "{{ $errors->first('nom_Type') }}",
                icon: "warning",
                 button: "Ok",
                });
        @endif                            
    </script>
   
@endsection()

<!--script for this page-->
<script type="text/javascript" src="{{asset('backend/lib/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/lib/gritter-conf.js')}}"></script>

