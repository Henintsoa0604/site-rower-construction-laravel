@extends('layouts.backend.menu')

@section('content')
<section id="main-content">
      <section class="wrapper">
      <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Gerer activite</h>
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
                    <th> Nom</th>
                    <th class="hidden-phone">Description</th>                    
                    
                    <th><i class=" fa fa-edit"></i> Action</th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($activites as $activite)
                  <tr>
                     <td>{{ $activite->nom}}</td>
                     <td class="hidden-phone">{{ $activite->description}}</td>
                    
                    <td>
                      
                    <button class="btn btn-primary btn-xs">
                         <a href="{{ route ('activite.editer', ['id'=>$activite->id]) }}" style="color:white;"
                            <i class="fa fa-pencil"></i>
                         </a>
                    </button>                   
                      <button class="btn btn-danger btn-xs"><a href="{{ route ('activite.supprimer', ['id'=>$activite->id]) }}" style="color:white;"><i class="fa fa-trash-o"></i></a></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
               
              </table>
              <hr>
              <div class="text-center">
              {{ $activites->links() }}
              </div>
               
            </div>
            <!--/showback -->
     
          </div>
          <!-- /col-lg-6 -->
          <div class="col-lg-6 col-md-8 col-sm-12">
            <!--  ALERTS EXAMPLES -->
            <div class="showback">
              <center> <h4> Ajout nouvelle activité</h4></center>
              <div id="message"></div>
              <hr>
            <form class="contact-form php-mail-form" role="form" action="{{ route('activite.Ajout')}}" method="POST">
            {{ csrf_field() }}
            <br> 
              <div class="form-group">
              <label for="exampleInputEmail1">Nom d'activite</label>
                <input type="texte" name="nom" class="form-control" id="contact-name" placeholder="Entre le nom de l'activite" data-rule="minlen:4"  >
                @if ($errors->has('nom'))                    
                   <span class="help-block ">
                       <strong style="color:#a94442;">{{ $errors->first('nom') }}</strong>
                    </span>
                 @endif
              </div>
             
              <div class="form-group">
              <label for="exampleInputEmail1">Description d'activite</label>
                <textarea class="form-control" name="description" id="contact-message" placeholder="Entre la desription de l'activite" rows="5" data-rule="required"></textarea>
                @if ($errors->has('description'))                    
                   <span class="help-block ">
                       <strong style="color:#a94442;">{{ $errors->first('description') }}</strong>
                    </span>
                 @endif
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

