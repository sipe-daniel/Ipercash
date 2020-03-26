<?php
  require 'config.php';

  if(isset($_POST['services']) && isset($_POST['somme']) ) {
    $_SESSION['service'] = $_POST['services'];
    $_SESSION['somme'] = $_POST['somme'];
    $_SESSION['montant_xaf'] = $_POST['montant_xaf'];
    if(!empty($_SESSION['session_uid'])) {
      header('Location:transfert/index.php');
    }
    else {
      header('Location:inscription.php');
    }
  }
/*   else {
      $url='transfert.php';
      header("Location: $url");
  } */
?>

<!DOCTYPE html >
<html lang="en" >

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/icon-ipercash.png" type="image/png" >
    <title>IPercash | Transfert d'argent de l'étranger vers les mobiles money</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <link href="css/agency.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>
    <link href="css/transfert.css" rel="stylesheet">
  </head>

  <body id="page-top"  ng-app="myApp">
    <!-- nav -->
    <?php include('partials/nav.php');?>
    <!-- Header -->
    <header class="masthead" id="acceuil">
      <div class="container"> 
        <div class="intro-text"  style="padding-top: 5em;">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 icone">
                    <div class="row">
                      <div class="col-md-4">
                        <span class="fa-stack fa-3x">
                          <i class="fa fa-circle fa-stack-2x text-primary"></i>
                          <i class="fa fa-mouse-pointer fa-stack-1x fa-inverse" ></i>
                        </span>
                      </div>
                      <div class="col-md-6">
                            <h4 class="service-heading">{{'Transfert_simplicite_title' | translate}}</h4>
                              {{'Transfert_simplicite_detail '| translate}}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <span class="fa-stack fa-3x">
                          <i class="fa fa-circle fa-stack-2x text-primary"></i>
                          <i class="fa fa-bolt fa-stack-1x fa-inverse"></i>
                        </span>
                      </div>
                      <div class="col-md-6">
                            <h4 class="service-heading"> {{'Transfert_rapidite_title' | translate}} </h4>
                            {{'Transfert_rapidite_detail' | translate}}  
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <span class="fa-stack fa-3x">
                          <i class="fa fa-circle fa-stack-2x text-primary"></i>
                          <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                      </div>
                      <div class="col-md-6">
                        <h4 class="service-heading"> {{'Transfert_securite_title' | translate}} </h4>
                        {{'Transfert_securite_detail' | translate}}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <span class="fa-stack fa-3x">
                          <i class="fa fa-circle fa-stack-2x text-primary"></i>
                          <i class="fa fa-usd fa-stack-1x fa-inverse" ></i>
                        </span>
                      </div>
                      <div class="col-md-6">
                          <h4 class="service-heading"> {{'Transfert_moindrecout_title' | translate}} </h4>
                          {{'Transfert_moindrecout_detail' | translate}}
                      </div>
                    </div>
                </div>

                <div class="col-md-6" >
                  <form style="margin-top:1em;" id="msform" action="transfert.php" method="post">
                    <fieldset>
                      <h4>{{'Transfert_form_title' | translate}}</h4>
                      <hr/>
                      
                      <div class="form-group">
                        <select class="form-control col-md-12 " id="service" name="services" >
                          <option>{{'Transfert_form_choisir_service' | translate}}</option>
                          <option value="2" selected>{{'Transfert_form_firstservice' | translate}}</option>
                        </select>
                      </div>

                      <div class="form-row"  ng-controller="myCtrl" >
                        <div  class="container">
                          <input required type="hidden" ng-model="amount" class="form-control" />
                        </div>

                        <div class="form-group col-md-12">
                          <select required class="form-control" name="mySelect" id="mySelect" ng-options="option.amount for option in cash track by option.id" ng-model="selectedCash" onchange="bilan()">
                          <option value=''>{{'Transfert_form_amountCFA' | translate}}</option>
                          </select>
                        </div>

                        <div class="col-md-12 bilan" style="display:none; background-color:#b7babd; border-radius:10px;margin-bottom:1em; padding:20px">
                          <p>{{'Transfert_form_amount' | translate}} <span class="pull-right"><b>XAF {{selectedCash.amount}}</b></span> </p>
                          <p>{{'Transfert_form_frais' | translate}} <span class="pull-right"><b>XAF {{selectedCash.cost}}</b><br><b>EUR {{(selectedCash.cost)/655|number:2}}</b></span></p><br>
                          <p style="border-top:1px solid #8e8989;color:red;">{{'Transfert_form_total' | translate}} <span class="pull-right"><b>XAF {{selectedCash.amount+selectedCash.cost}}</b><br/><b>EUR {{(selectedCash.amount+selectedCash.cost)/655|number:2}}</b><br/>
                          <span ng-repeat="(key,quote) in quotes" ng-show="([key] | filter:searchCurrency).length > 0">
                          </span></span></p><br/>
                          <p >{{'Transfert_form_reçu' | translate}} </p>
                          <p style="border-top:1px solid #8e8989;"><span class="pull-right" ><b>XAF {{selectedCash.amount}}</b></span></p>
                          <input type="hidden" name="somme" value="{{(selectedCash.amount+selectedCash.cost)/655|number:2}}">
                          <input type="hidden" name="montant_xaf" value="{{selectedCash.amount}}">
                        </div>
                      </div>
                      
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <input type="submit" value="{{'Transfert_form_envoyer' | translate}}" class="btn btn-primary btn-lg text-uppercase js-scroll-trigger"  role="button" title="Envoyer" style="width: 100%;">
                        </div>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <script type="text/javascript" src="js/transfert.js"></script>

  <!-- footer -->
  <?php include('partials/footer.php');?>
  <script type="text/javascript">
  // affiche les montants
  function bilan(){
  $('.bilan').show("slow");
  }
  </script>

  </body>
  
</html>
