@extends('layouts.backend.menu')

@section('content')

<section id="main-content">
      <section class="wrapper">
        <h3><a href="{{route('home')}}" style="color:#797979;">Accueil</a>  
        <i class="fa fa-angle-right"></i><a href="{{route('membre')}}" style="color:#797979;">Gerer membre</a>
        <i class="fa fa-angle-right"></i><a href="" style="color:#797979;">liste membre</a></h3>
        
        <div class="row mt">
          <div class="col-md-12">
            <div>
                  <div class="col-sm-8">
                  <br>                 
                      <h4 style="margin-left:15%; "> Les membres disponibles chez Rower</h4> 
                  </div>                  
                  <div class="col-sm-4">
                  <br>
                  <a href="{{route('membre.ajout')}}">  <button class="btn btn-theme" >
                       <i class="fa fa-plus"></i>Ajout nouveau membre 
                    </button> </a>
                  </div>
            </div>
           
            <div class="content-panel">
            <br><br>
              <table class="table table-striped table-advance table-hover"> 
              <hr>               
                <thead>                
                  <tr>
                    <th> Matriculation</th>
                    <th> Nom </th>
                    <th> image </th>
                    <th> poste</th>
                    <th>description</th>                 
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>   
                @foreach($membres as $membre)
                  <tr>
                  <td>
                    {{ $membre->identifiant}}
                    </td>
                    <td>
                    {{ $membre->nomMembre}} {{ $membre->prenom}}
                    </td>
                    <td><img src="{{asset('uploads/membre/'.$membre->imageMembre)}}"  alt="Avatar"  width="50"></td>
                    <td>{{ $membre->poste}}</td>
                    <td>{{ $membre->descriptionMembre}}</td>                    
                    <td>
                   
                      <button class="btn btn-primary btn-xs">
                         <a href="{{ route ('membre.editer', ['id'=>$membre->id]) }}" style="color:white;" onclick="return modifier()"
                            <i class="fa fa-pencil"></i>
                         </a>
                      </button>
                      <button class="btn btn-danger btn-xs">
                         <a href="{{ route ('membre.supprimer', ['id'=>$membre->id]) }}" style="color:white;">
                           <i class="fa fa-trash-o"></i>
                        </a>
                     </button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="text-center panel-footer">
                 {{ $membres->links() }}
                </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
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
         function modifier() {
            swal({
              title: "Avez_vous sure?",
              text: "de supprimer cette activite!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            });
                           
          }
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
<script src="{{asset('backend/lib/sparkline-chart.js')}}"></script>
