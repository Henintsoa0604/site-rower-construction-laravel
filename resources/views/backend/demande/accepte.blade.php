@extends('layouts.backend.menu')

@section('content')
   <!--main content start-->
   <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Gerer modele <i class="fa fa-angle-right"></i> Gerer modele</h3>
        
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
               <center><h4> Liste des demande d'information Acceptés</h4></center> 
                <hr>
                <thead>
                  <tr>
                    <th> Nom</th>
                    
                    <th> email</th>
                    <th> telephone</th>                    
                    <th> status</th> 
                    <th> Date </th>                 
                    
                  </tr>
                </thead>
                <tbody>   
                @foreach($accepte as $acceptes)
                  <tr>
                    <td>
                      {{ $acceptes->nomClient}} {{ $acceptes->prenomClient}}
                    </td>
                    
                    <td>{{ $acceptes->emailClient}} </td>
                    <td>{{ $acceptes->telephoneClient}}</td>                     
                    <td><span class="label label-warning label-mini"> {{ $acceptes->status}}</span></td>
                    <td>{{ $acceptes->created_at}}</td>                     
                  
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="text-center panel-footer">
                  {{ $accepte->links() }}
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
