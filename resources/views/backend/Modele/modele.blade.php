@extends('layouts.backend.menu')

@section('content')
   <!--main content start -->
   <section id="main-content">
      <section class="wrapper">
      <h3><a href="{{route('home')}}" style="color:#797979;">Accueil</a>  
        <i class="fa fa-angle-right"></i><a href="{{route('modele')}}" style="color:#797979;">Gerer modèle</a>
        <i class="fa fa-angle-right"></i><a href="" style="color:#797979;">liste modèle</a></h3>
        
        <div class="row mt">
          <div class="col-md-12">
          <div>
                  <div class="col-sm-8">
                  <br>                 
                      <h4 style="margin-left:15%; "> Liste des modèles disponibles</h4> 
                  </div>                  
                  <div class="col-sm-4">
                  <br>
                  <a href="{{route('modele.ajout')}}">  <button class="btn btn-theme" >
                       <i class="fa fa-plus"></i>Ajout nouveau modèle
                    </button> </a>
                  </div>
            </div>

            <div class="content-panel">
            <br><br>
              <table class="table table-striped table-advance table-hover">            
               
                <hr>
                <thead>
                  <tr>
                    <th> Nom</th>
                    <th> image </th>
                    <th> Montant</th>
                    <th>type construction</th>                 
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>   
                @foreach($modeles as $modele)
                  <tr>
                    <td>
                      {{ $modele->nomModele}}
                    </td>
                    <td><img src="{{asset('uploads/modeles/'.$modele->imageIllustration)}}"  alt="Avatar"  width="50"></td>
                    <td>{{ $modele->montantDeOperation}} Ar</td>
                    <td>{{ $modele->nom_Type}}</td>                    
                    <td>
                    <button class="btn btn-success btn-xs">
                      <a href="{{ route ('modele.show', ['id'=>$modele->id]) }}" style="color:white;"
                            <i class="fa fa-eye"></i>
                         </a>
                      </button>
                      <button class="btn btn-primary btn-xs">
                         <a href="{{ route ('modele.editer', ['id'=>$modele->id]) }}" style="color:white;"
                            <i class="fa fa-pencil"></i>
                         </a>
                      </button>
                      <button class="btn btn-danger btn-xs">
                         <a href="{{ route ('modele.supprimer', ['id'=>$modele->id]) }}" style="color:white;">
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
                  {{ $modeles->links() }}
                </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->


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
<script src="{{asset('backend/lib/sparkline-chart.js')}}"></script>
