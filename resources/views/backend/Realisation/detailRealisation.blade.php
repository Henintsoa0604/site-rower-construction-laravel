@extends('layouts.backend.menu')

@section('content')
<section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4>{{ $realisations->province}}</h4>
                  <h6>PROVINCE</h6>
                  <h4>{{ $realisations->region}}</h4>
                  <h6>REGION</h6>
                  <h4>{{ $realisations->ville}}</h4>
                  <h6>VILLE</h6>
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3>{{ $realisations->nomRealisation}}</h3>
                <h6></h6>
                <p>{{ $realisations->descriptionRealisation}}.</p>
                <br>
                <p><button class="btn btn-theme"><i class="fa fa-usd"></i> {{ $realisations->montantRealisation}} Ar</button></p>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="{{asset('uploads/realisations/'.$realisations->imageRealisation)}}" class="img-circle"></p>
                  <p>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Ajout image en gallery</button>                    
                  <a  href="{{route('realisation')}}">
                   <button class="btn btn-theme"><i class="fa fa-arrow-circle-o-left"></i> Retour</button></a> 
                  </p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
          <h3><i class="fa fa-angle-right"></i> Gallery</h3>
              <div class="row mt">
              
              
              @foreach($galleries as $gallery)
                  
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc" >
                <button class="btn btn-sm btn-clear-g">
                <a href="{{ route ('gallery.supprimer', ['id'=>$gallery->id]) }}">
                SUPPRIMER
                </a>
                </button>
                <a class="fancybox" href="{{asset('uploads/Gallery/'.$gallery->gallery)}}">               
                   <div class="gallery" 
                   style="height:200px; 
                   background-image:url('{{asset('uploads/Gallery/'.$gallery->gallery)}}');
                   background-repeat:no-repeat;
                   background-size:cover;
                   backgroud-position:center;"
                   >                   
                   </div>
                </a> 
                </div> 
                
                @endforeach  
             
                <!-- col-lg-4 --->
                <div class="text-center">
                  {{ $galleries->links() }}
                </div>

              </div>
              <!-- /row -->

              <script type="text/javascript">
    $(function() {
      //    fancybox
      jQuery(".fancybox").fancybox();
    });
  </script>

            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Ajout nouvelle image en gallery</h4>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal style-form" method="post" action="{{ route('realisation.gallery')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                            <label class="col-lg-3 control-label">Realisation </label>
                            <div class="col-lg-8">
                                <select name="realisation_id" id="realisation_id" class="form-control">
                                   
                                    @foreach($types as $type)
                                    @if( $type->id == $realisations->id)
                                    <option value="{{ $type->id}}" selected > {{ $type->nomRealisation }}</option>
                                    
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         
                     <div class="form-group">
                    <label for="logo" class="col-lg-3 control-label">Photo</label>
                    <div class="col-lg-8">
                    <input type="file" class="form-control" accept="image/*" name="gallery" id="file" onchange="loadFile(event)" style="display:none;">
                    
                    <div style="display: inline-block;
                            margin-bottom: 5px;
                            overflow: hidden;
                            text-align: center;
                            vertical-align: middle;
                            width:150px;
                            height:150px;
                            border: 1px solid #ddd;
                            "> 
                            <p><img id="output" width="150" /></p>
                    </div>
                    <p><label for="file" style="cursor: pointer;" class="btn btn-info"> <i class="fa fa-camera"></i> Telecharge l'image </label></p>
                    
                    @if ($errors->has('imageMembre'))                    
                       <span class="help-block ">
                           <strong style="color:#a94442;">{{ $errors->first('imageMembre') }}</strong>
                       </span>
                    @endif

                    @if(Session::has('error'))
                    <span class="help-block ">
                        <strong style="color:#a94442;">{{Session::get('error') }}</strong>
                    </span>                      
                    @endif
                    </div>
                    
                </div>
                    <form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Enregistre</button>
                    </div>
                  </div>
                </div>
              </div>
              <script>
                var loadFile = function(event){
                    var image = document.getElementById('output');
                    image.src = URL.createObjectURL(event.target.files[0]);
                };
                
             </script>
            <script src="{{asset('backend/lib/common-scripts.js')}}"></script>
                <script type="text/javascript">
                    $(function() {
                    //    fancybox
                    jQuery(".fancybox").fancybox();
                    });
            </script>
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
@endsection()