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
        <div class="row mt ">
        
          <div class="col-lg-6 col-md-8 col-sm-12 col-lg-offset-2">
            <!--  ALERTS EXAMPLES -->
            <div class="showback">
              <center> <h4> Modifie le type de construction Numero {{$constructions->id}}</h4></center>
              <div id="message"></div>
              <hr> <br>
            <form class="contact-form php-mail-form" role="form" action="{{ route ('construction.update', ['id'=>$constructions->id]) }}" method="POST">
            {{ csrf_field() }}
            <br> 
              <div class="form-group">
              <label for="exampleInputEmail1">Type de Construction</label>
                <input type="texte" name="nom_Type" value="{{$constructions->nom_Type}}" class="form-control" id="contact-name" placeholder="Entre le nom de l'activite" data-rule="minlen:4"  >
                @if ($errors->has('nom_Type'))                    
                   <span class="help-block ">
                       <strong style="color:#a94442;">{{ $errors->first('nom_Type') }}</strong>
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

@endsection()
<!--script for this page-->
<script type="text/javascript" src="{{asset('backend/lib/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/lib/gritter-conf.js')}}"></script>
 
