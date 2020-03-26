<?PHP
session_start();
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
// Signature key entered on MMS. The demo accounts is fixed to this value,
    $montant = htmlspecialchars($_SESSION['somme']*100);
    $email = htmlspecialchars($_SESSION['email']);
    $username = explode(" ", $_SESSION['nom']);
    $nom = htmlspecialchars($username[1]);
    $prenom = htmlspecialchars($username[0]);
?>

<!doctype html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="UTF-8">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" href="../img/icon-ipercash.png" type="image/png" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>IPercash | Plate forme de paiement de services en ligne</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
    <!-- Language js -->
    <script data-require="angular.js@1.3.8" data-semver="1.3.8" src="https://code.angularjs.org/1.3.8/angular.js"></script>
    <script data-require="angular-translate@*" data-semver="2.5.0" src="https://cdn.rawgit.com/angular-translate/bower-angular-translate/2.5.0/angular-translate.js"></script>
    <script src="../js/script_language.js"></script>
</head>

<body  ng-controller="translateController">
<div class="image-container set-full-height" style="background-image: url('assets/img/back.jpeg')">
    <!--   Creative Tim Branding   -->
  
    <a href="../">
         <div class="logo-container">
            <i class="fa fa-home" style="font-size:30px"></i>
            <div class="brand">
                Accueil
            </div>
        </div>
    </a>


    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="purepay.php" method="post" >
                    	<div class="wizard-header">
                        	<h3>
                        	   <b style="color: #FF3B30">{{'TransfertIndex_titre' | translate}}</b> <br>
                        	   <small>{{'TransfertIndex_soustitre' | translate}}</small>
                        	</h3>
                        </div>
                        
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">{{'TransfertIndex_apropos' | translate}}</a></li>
	                            <li><a href="#account" data-toggle="tab">{{'TransfertIndex_destinataire' | translate}}</a></li>
	                        </ul>
						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text">{{'TransfertIndex_vosinformation' | translate}}</h4>
                                  <div class="col-sm-6  col-sm-offset-2">
                                      <div class="form-group">
                                        <label>  <small>({{'TransfertIndex_champobligatoire' | translate}})</small></label>
                                        <input name="firstname" type="text" class="form-control" value="<?= $nom ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label>{{TransfertIndex_nom | translate}} <small>({{'TransfertIndex_champobligatoire' | translate}})</small></label>
                                        <input name="lastname" type="text" class="form-control" value="<?= $prenom ?>" disabled>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>{{'TransfertIndex_vform_email' | translate}} <small>({{'TransfertIndex_champobligatoire' | translate}})</small></label>
                                          <input name="email" type="email" class="form-control" value="<?= $email ?>" disabled>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> {{'TransfertIndex_info_destinataire' | translate}}</h4>
                                <div class="row">

                                <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>{{'TransfertIndex_infonom_destinataire' | translate}} <small>({{'TransfertIndex_champobligatoire' | translate}})</small></label>
                                          <input name="nom_client" id="nom_client" type="text" class="form-control" placeholder="Exemple: Jean">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>{{'TransfertIndex_infoprenom_destinataire' | translate}} <small>({{'TransfertIndex_champobligatoire' | translate}})</small></label>
                                          <input name="prenom_client" id="prenom_client" type="text" class="form-control" placeholder="Exemple: Paul">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>{{'TransfertIndex_infotelephone_destinataire' | translate}} <small>({{'TransfertIndex_champobligatoire' | translate}})</small></label>
                                          <input name="telephone_client" id="telephone_client" type="number" class="form-control" placeholder="Exemple: 679000000">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>{{'TransfertIndex_confirmerinfotelephone_destinataire' | translate}} <small>({{'TransfertIndex_champobligatoire' | translate}})</small></label>
                                          <input name="confirme_telephone" type="number" class="form-control" placeholder="Exemple: 679000000" onclick="valid_phone()">
                                      </div>
                                  </div>

                                </div>
                            </div>
                        </div>

                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' onClick="getInfo();" name='next' value="{{'TransfertIndex_suivant' | translate}}" />
                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value="{{'TransfertIndex_confirmez' | translate}}" />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value="{{'TransfertIndex_precedent' | translate}}" />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> 
        </div>
        </div>
    </div> 

    <div class="footer">
        <div class="container">
             Copyright IPercash 2019
        </div>
    </div>

</div>




<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	<script src="assets/js/gsdk-bootstrap-wizard.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>

    

    <script>
        function getInfo() {
            nom_client = $('#nom_client').val();

            prenom_client = $('#prenom_client').val();

            tel_client = $('#telephone_client').val();
            $.ajax({
            type: "POST",
            url: "../session.php",
            data: { nom_client: nom_client, prenom_client: prenom_client, tel_client: tel_client, action: "destinataire_session" }
            }).done(function( msg ) {
                // alert( "Data Saved: " + msg );
                $('#info_nom').html(nom_client);
                $('#info_prenom').html(prenom_client);
                $('#info_tel').html(tel_client);
            });

            var request = new XMLHttpRequest();

            request.open('POST', 'https://gateway.purepay.eu/hosted/');

            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            request.onreadystatechange = function () {
            if (this.readyState === 4) {
                console.log('Status:', this.status);
                console.log('Headers:', this.getAllResponseHeaders());
                console.log('Body:', this.responseText);
            }
            };

            var body = "merchantID=100001&action=SALE&type=1&amount=1099&currencyCode=826&countryCode=826&transactionUnique=55e6db3c81d75&orderRef=Test+hosted+purchase&redirectURL=http://www.example.com&signature=b1b7fbfe0c08dabaaafa75aab3ae369f36d6b9788805e75a5b8f6f90c56d89bc62ffb6b5300a801ec3e28fedb78bf96aec4f97b092d2c4bef2cb99e8f8c51eb5";

            request.send(body);
        }

        function valid_phone() {
            tel_client = $('#telephone_client').val();
            arr = tel_client.toString(10).split('').map(Number);
            if (arr.length < 9) {
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Le numéro doit avoir 9 chiffres');
                $('#telephone_client').val('');
            }
            console.log(arr);
            if (arr[0] !== 6) {
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Le numéro doit commencé par 6');
                $('#telephone_client').val('');
            }
            /* if (arr[1] != 5) {
                alert('Numéro de téléphone ' + arr[1] + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
            }
            else if (arr[1] != 7) {
                alert('Numéro de téléphone ' + arr[1] + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
            }

            else if (arr[1] != 9) {
                alert('Numéro de téléphone ' + arr[1] + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
            } */

            switch(arr[1]) {
                case 0:
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
                break;
                case 1:
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
                break;
                case 2:
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
                break;
                case 3:
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
                break;
                case 4:
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
                break;
                case 6:
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
                break;
                case 8:
                alert('Numéro de téléphone ' + tel_client + ' incorrect. Nous acceptons uniquement les numéros NTM ou ORANGE CAMEROUN');
                $('#telephone_client').val('');
                break;
            }
        }
    </script>
</body>

</html>
