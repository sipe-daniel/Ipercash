  <!-- Footer -->
    <footer style="background-color:#949090;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; IPercash</span>
          </div>
          <div class="col-md-3">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-5">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="{{'Document_pdf_confidentialite' | translate}}" target="_blank">{{'Footer_politique' | translate}}</a>
              </li>
              <li class="list-inline-item">
                <a href="{{'Document_pdf_termes_et_condition' | translate}}" target="_blank">{{'Footer_term_condition' | translate}}</a>
              </li>
              <li class="list-inline-item">
                <a href="{{'Document_pdf_condition_utilisation' | translate}}" target="_blank">{{'Footer_conditionuser' | translate}}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Connexion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="logForm">
              <?php if(!empty($_SESSION['service'])) {
                ?>
                  <input name="redirect" id="redirect" type="hidden" value="1">
                <?php
              }
              else {
                ?>
                  <input name="redirect" id="redirect" type="hidden" value="0">
                <?php
              }
              ?>
                <div class="col-md-12">
                  <div class="from-group">
                    <label for="email">{{'Footer_form_email' | translate}}<span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control"  required/>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="from-group">
                    <label for="password">{{'Footer_form_motdepasse' | translate}}<span class="text-danger">*</span></label>
                    <input  type="password" name="mdp" id="password" class="form-control"  required/>
                    <a href="#" onclick="password_recovery()">{{'Footer_form_motdepasseoublie' | translate}}</a>
                  </div>
                </div>
            
          </div>
          <div class="modal-footer" id="first">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermez</button>
            <button type="submit" class="btn btn-primary">connexion</button>
          </div>
          </form>
          <form id="recoverPassword" style="display: none">
            <div class="modal-body">
              <p>Nous vous enverons un code par email pour vous permettre de créer un nouveau mot de passe</p>
              <div class="col-md-12">
                <div class="from-group">
                <label for="email_resto">Entrez votre email<span class="text-danger">*</span></label>
                  <input type="email" name="email_resto" id="email_resto" class="form-control"  required/>
                </div>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermez</button>
            <button type="submit" class="btn btn-primary">Envoyez</button>
          </div>
          </form>
        </div>
      </div>
    </div>




  

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script  src="js/indexform.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

    
    <script>
      

        // Attach a submit handler to the form
        $( "#logForm" ).submit(function( event ) {
          // alert('ok');
          // Stop form from submitting normally
          event.preventDefault();
        
          // Get some values from elements on the page:
          // var $form = $( this ),
            term  = {
            'username' : $('input[name=email]').val(),
            'password' : $('input[name=mdp]').val(),
            'redirect' : $('input[name=redirect]').val()
            };
            url = "controleur.php?action=login";
        
          // Send the data using post
          var posting = $.post( url, { username:term.username, password:term.password } );
        
          // Put the results in a div

          posting.done(function( data ) {
            // alert(data);
            if(data == 1 && term.redirect == 1) {
              window.location.href = "transfert/index.php";
            }
            else if(data == 1 && term.redirect == 0) {
              window.location.href = "transfert.php";
            }
            else if(data == 2) {
              window.location.href = "mailSending.php";
            }
            else {
              alert("Login ou mot de passe incorrect !")
            }
            
          });
        });

        $( "#recoverPassword" ).submit(function( event ) {
          // alert('ok');
          // Stop form from submitting normally
          event.preventDefault();
        
          // Get some values from elements on the page:
          // var $form = $( this ),
            term  = {
            'email_resto' : $('input[name=email_resto]').val(),
            };
            url = "controleur.php?action=resto_email_code";
        
          // Send the data using post
          var posting = $.post( url, { email_resto:term.email_resto } );
        
          // Put the results in a div

          posting.done(function( data ) {
            // alert(data);
            if(data == 1) {
              window.location.href = "resto_email_code.php";
            }
            else {
              alert("Cet email n'existe pas dans notre système !")
            }
            
          });
        });

        function password_recovery() {
          $("#logForm").hide();
          $("#first").hide();
          $("#recoverPassword").show();
        }
</script>