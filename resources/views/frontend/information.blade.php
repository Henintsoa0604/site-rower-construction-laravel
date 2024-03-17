    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Demande d'information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>        
        <!-- Modal body -->
        <div class="modal-body">
                <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
            <form action="{{route('distrubition.ajout')}}" method="post" role="form">
            {{ csrf_field() }}
              <div class="form-group">
                <input type="text" class="form-control" name="nomClient" id="subject" placeholder="Nom" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="prenomClient" id="subject" placeholder="Prenom"  />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="emailClient" id="subject" placeholder="Email"  />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="telephoneClient" id="subject" placeholder="Telephone" data-rule="minlen:5" data-msg="10 caractere" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <center> <button type="submit" class="btn btn-danger">Envoyer</button></center>
            </form>
      </div>
    </section><!-- End Contact Section -->
        </div>
    
        
      </div>
    </div>
  </div>

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