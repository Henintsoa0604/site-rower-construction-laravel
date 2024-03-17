@extends('layouts.backend.menu')

@section('content')

<section id="main-content">
      <section class="wrapper">
        <h3><i></i> Construction/type/ajout</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 ><i></i> Ajout type construction</h4>
              @if(Session::has('success'))

              <div class="alert alert-success"><b>Success!</b> {{Session::get('success') }}.</div>
               
             @endif
              <form class="form-horizontal style-form" method="Post" action="{{ route('type_constructionAjoutAction')}}">
              {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type de Construction</label>
                  <div class="col-sm-10">
                    <input type="text" name="nom_Type" id="nom_Type" class="form-control">
                        @if ($errors->has('nom_Type'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('nom_Type') }}</strong>
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
       
      </section>
      <!-- /wrapper -->
    </section>

    <script src="{{ asset('backend/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
    
@endsection()