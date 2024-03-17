@extends('layouts.backend.menu')

@section('content')

 <!--main content start-->
 <section id="main-content">
      <section class="wrapper">
        <h3></i> Ajout Societe</h3>
        
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="{{ route('rower.ajoutAction')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group ">
                    <label for="nom" class="control-label col-lg-2">Nom de la societe</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="nom" name="nom" minlength="2" type="text" />
                            @if ($errors->has('nom'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('nom') }}</strong>
                                </span>
                            @endif
                    </div>
                    
                  </div>
                  <div class="form-group ">
                    <label for="logo" class="control-label col-lg-2">logo</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="logo" type="file" name="logo"/>
                             @if ($errors->has('logo'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="siege" class="control-label col-lg-2">siege de la societe</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="siege" name="siege" minlength="2" type="text" />
                            @if ($errors->has('siege'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('siege') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="date" class="control-label col-lg-2">date de la creation</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="date" name="date" minlength="2" type="date" />
                      @if ($errors->has('date'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('date') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>                 
                  <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                      <textarea class="form-control " id="description" name="description"></textarea>
                          @if ($errors->has('description'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="mail" type="email" name="mail" />
                      @if ($errors->has('mail'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('mail') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="telephone" class="control-label col-lg-2">Telephone</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="telephone" type="text" name="telephone" />
                        @if ($errors->has('telephone'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('telephone') }}</strong>
                                </span>
                         @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-10 col-lg-10">
                      <button class="btn btn-theme" type="submit">Ajouter</button>
                      
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
       
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

 <!--script for this page-->
 <script src="{{asset('backend/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/date.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
  <script src="{{asset('backend/lib/advanced-form-components.js')}}"></script>
  <script src="{{asset('backend/lib/form-validation-script.js')}}"></script>

@endsection()