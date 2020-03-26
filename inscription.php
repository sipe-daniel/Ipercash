<?php
  require 'config.php';
?>

<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
  <meta charset="UTF-8">
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/icon-ipercash.png" type="image/png" >

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <link href="css/agency.min.css" rel="stylesheet">

    <title>IPercash - Plate forme de paiement de services en ligne</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inscription.css">
  
</head>

<body ng-controller="translateController">
<!-- nav -->
<?php include('partials/nav.php');?>

<div class="row dimension_col">
  <div class="col-md-12 ">
    <!-- multistep form -->
    <form id="msform" style="margin-top:6em;" action="controleur.php?action=createUser">
     
      <!-- fieldsets -->
      <fieldset>
        <h2 class="fs-title">{{'Formulaire_creation_compte' | translate}}</h2>
        <div id="compte">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <div class="from-group">
              <input type="text" name="nom" placeholder="{{'Formulaire_creation_compte_nom' | translate}}" required/>
            </div>
          </div>
          <div class="col-md-6 col-xs-12">
            <div class="form-group">
              <input type="text" name="prenom" placeholder="{{'Formulaire_creation_compte_prenom' | translate}}" required/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="from-group">
              <select id="select" name="pays" style="width: 100%; margin-bottom: 5px; height: 35px;">
                <option>{{'Formulaire_creation_compte_pays' | translate}}</option>
              </select>
            </div>
          </div><br><br>
          <div class="col-md-12 col-xs-12">
            <div class="form-group">
              <input type="text" name="ville" placeholder="{{'Formulaire_creation_compte_ville' | translate}}" required/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="from-group">
              <input type="email" name="email_user" placeholder="{{'Formulaire_creation_compte_email' | translate}}" required/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="from-group">
              <input type="password" name="pass" placeholder="{{'Formulaire_creation_compte_password' | translate}}" required/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="from-group">
              <input type="password" name="cpass" placeholder="{{ 'Formulaire_creation_compte_confirmpassword' | translate}}" required/> 
            </div>
          </div>
        </div>

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="defaultUnchecked" required>
          <label class="custom-control-label" for="defaultUnchecked">{{'Formulaire_creation_compte_terms_first_part' | translate}} <a href="termes_et_condition.pdf" target="_blank">{{'Formulaire_creation_compte_terms_second_part' | translate}}</a></label>
        </div>

        </div>
          
  
          
        <input type="submit" class="action-button" value="{{'Formulaire_creation_compte_register' | translate}}" />
        {{'Formulaire_creation_compte_alreadyaccount' | translate}} <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success">{{'Formulaire_creation_compte_meconnecter' | translate}}</a>
      </fieldset>
    </form>

  </div>

</div>
<?php include('partials/footer.php');?>


<script src="js/inscription.js" ></script>

  
</body>

</html>



