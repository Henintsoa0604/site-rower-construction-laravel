@extends('layouts.backend.menu')

@section('content')
   <!--main content start-->
   <section id="main-content">
      <section class="wrapper">
      <h3><a href="{{route('home')}}" style="color:#797979;">Accueil</a>  
        <i class="fa fa-angle-right"></i><a href="{{route('attente')}}" style="color:#797979;">Gerer démande</a>
        <i class="fa fa-angle-right"></i><a href="" style="color:#797979;">liste démande en attente</a></h3>
        
        <div class="row mt">
          <div class="col-md-12">
          <div>
                  <div class="col-sm-8">
                  <br>                 
                      <h4 style="margin-left:15%; "> Liste des démandes d'information en attente</h4> 
                  </div>                  
                  <div class="col-sm-4">
                  <br>
                  <a href="{{ route('accepte')}}">  <button class="btn btn-theme" >
                       Liste démande accepté
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
                    
                    <th> email</th>
                    <th> telephone</th>                    
                    <th> status</th> 
                    <th> Date </th>                 
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>   
                @foreach($attente as $attentes)
                  <tr>
                    <td>
                      {{ $attentes->nomClient}} {{ $attentes->prenomClient}}
                    </td>
                    
                    <td>{{ $attentes->emailClient}} </td>
                    <td>{{ $attentes->telephoneClient}}</td>                     
                    <td><span class="label label-warning label-mini"> {{ $attentes->status}}</span></td>
                    <td>{{ $attentes->created_at}}</td>                     
                    <td>
                      
                    
                      <button  class="btn btn-theme">
                         <a href="{{ route ('demande.editer', ['id'=>$attentes->id]) }}" style="color:white;">
                           <i class="fa fa-check-square"> Approuver </i>
                        </a>
                     </button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="text-center panel-footer">
                  {{ $attente->links() }}
                </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->


@endsection()
<script src="{{asset('backend/lib/sparkline-chart.js')}}"></script>
