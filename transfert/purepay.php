<?PHP
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Signature key entered on MMS. The demo accounts is fixed to this value,
$key = 'z9ymVP5RUK3T3g4A';

// Gateway URL
$url = 'https://gateway.purepay.eu/paymentform/';

?>
<!doctype html>
<html lang="en">
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
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets/img/back.jpeg')">  
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
                    	<div class="wizard-header">
                        	<h3>
                        	   <b style="color: #FF3B30">Formulaire d'envoi d'argent</b> <br>
                        	   <small>Envoyez de l'argent à vos proches en toute confiance.</small>
                        	</h3>
                    	</div>


                        <div class="tab-content">
                            <!-- <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text">Vos Informations</h4>
                                  
                                  <div class="col-sm-6  col-sm-offset-2">
                                      <div class="form-group">
                                        <label>Nom <small>(obligatoire)</small></label>
                                        <input name="firstname" type="text" class="form-control" value="<?= $nom ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label>Prénom <small>(obligatoire)</small></label>
                                        <input name="lastname" type="text" class="form-control" value="<?= $prenom ?>" disabled>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>Email <small>(obligatoire)</small></label>
                                          <input name="email" type="email" class="form-control" value="<?= $email ?>" disabled>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Informations concernant le destinataire </h4>
                                <div class="row">

                                <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>Nom du bénéficiaire <small>(obligatoire)</small></label>
                                          <input name="nom_client" id="nom_client" type="text" class="form-control" placeholder="Exemple: Jean">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>Prénom du bénéficiaire <small>(obligatoire)</small></label>
                                          <input name="prenom_client" id="prenom_client" type="text" class="form-control" placeholder="Exemple: Paul">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>Téléphone du bénéficiaire <small>(obligatoire)</small></label>
                                          <input name="telephone_client" id="telephone_client" type="number" class="form-control" placeholder="Exemple: 679000000">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-sm-offset-2">
                                      <div class="form-group">
                                          <label>Confirmez Téléphone <small>(obligatoire)</small></label>
                                          <input name="confirme_telephone" type="number" class="form-control" placeholder="Exemple: 679000000" onclick="valid_phone()">
                                      </div>
                                  </div>

                                </div>
                            </div> -->
                            <div class="tab-pane" id="address" style="display: block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Récapitulatif de la transaction </h4>
                                    </div>
                                    <div class="col-sm-12">
                                    <?php
                                if (!isset($_POST['responseCode'])) {
                                    // Send request to gateway
                                    $post = $_POST;
                                   /*  var_dump($post); */
                                    
                                        $montant = htmlspecialchars($_SESSION['somme']*100);
                                        $email = htmlspecialchars($_SESSION['email']);
                                        $username = explode(" ", $_SESSION['nom']);
                                        $nom = htmlspecialchars($username[1]);
                                        $prenom = htmlspecialchars($username[0]);
                                        $_SESSION['nom_client'] = $post['nom_client'];
                                        $_SESSION['prenom_client'] = $post['prenom_client'];
                                        $_SESSION['client_tel'] = $post['telephone_client'];
                                        var_dump($_SESSION);
                                        // Request
                                        $req = array( 
                                         'merchantID' => '119572',
                                         'action' => 'SALE',
                                         'type' => 1,
                                         'customerEmail' => $email,
                                         'currencyCode' => 'EUR',
                                         'amount' => $montant,
                                         'orderRef' => 'Test purchase',
                                         'transactionUnique' => uniqid(),
                                         'redirectURL' => ($_SERVER['HTTPS'] == 'on' ? 'https' : 'http') . '://' .
                                        $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                                         );
                                    
                                        // Create the signature using the function called below.
                                        $req['signature'] = createSignature($req, $key); 
                                        ?>

                                                <table class="table table-responsive" style="width:70%; margin-left: 15%">
                                                
                                                <tbody style="font-weight: bold">
                                                    <tr>
                                                    <th scope="row">1</th>
                                                    <td>Nom</td>
                                                    <td id="info_nom"><?= $post['nom_client'] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">2</th>
                                                    <td>Prenom</td>
                                                    <td id="info_prenom"><?= $post['prenom_client'] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">3</th>
                                                    <td>Téléphone</td>
                                                    <td id="info_tel"><?= $post['telephone_client'] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">4</th>
                                                    <td>Service</td>
                                                    <td  id="service">Transfert d'argent</td>
                                                    </tr>
                                                    <tr class="bg-warning">
                                                    <th scope="row">5</th>
                                                    <td>Montant</td>
                                                    <td id="amount"><b class="text-success"><?= $_SESSION['somme'] ?> €</b></td>
                                                    </tr>
                                                </tbody>
                                                </table>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="center">
                                <?php
                                        
                                        echo '<form action="' . htmlentities($url) . '" method="post">' . PHP_EOL;
                                        
                                         foreach ($req as $field => $value) {
                                         echo ' <input type="hidden" name="' . $field . '" value="' .
                                        htmlentities($value) . '">' . PHP_EOL;
                                         }
                                     
                                         echo ' <input type="submit" value="Effectuez le Paiement" class="btn btn-fill btn-warning btn-wd btn-sm" style="width:100%">' . PHP_EOL;
                                        echo '</form>' . PHP_EOL;
                                    
                                    } else {
                                        // Handle the response posted back
                                        $res = $_POST;
                                        // Extract the return signature as this isn't hashed
                                        $signature = null;
                                        if (isset($res['signature'])) {
                                         $signature = $res['signature'];
                                         unset($res['signature']);
                                         } 
                                         
                                         // Check the return signature
                                        if (!$signature || $signature !== createSignature($res, $key)) {
                                         // You should exit gracefully
                                         die('Sorry, the signature check failed');
                                         }
                                         
                                        // Check the response code
                                        if ($res['responseCode'] === "0") {
                                            $_SESSION['paymentid'] = $res['xref'];
                                            var_dump($_SESSION); exit;
                                            echo "<script> window.location.href =  '../success.php'; </script>";
                                         } else {
                                         echo "<p>Failed to take payment: " . htmlentities($res['responseMessage']) .
                                        "</p>";
                                         }
                                         
                                    }
                                    
                                    // Function to create a message signature
                                    function createSignature(array $data, $key) {
                                        // Sort by field name
                                        ksort($data);
                                        
                                        // Create the URL encoded signature string
                                        $ret = http_build_query($data, '', '&');
                                        
                                        // Normalise all line endings (CRNL|NLCR|NL|CR) to just NL (%0A)
                                        $ret = str_replace(array('%0D%0A', '%0A%0D', '%0D'), '%0A', $ret);
                                        
                                        // Hash the signature string and the key together
                                        return hash('SHA512', $ret . $key);
                                    }
                                    
                                    ?>
                            </div>
                        </div>

                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             Copyright IPercash 2019
        </div>
    </div>

</div>

</body>
</html>
