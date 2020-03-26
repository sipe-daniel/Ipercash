<?php
  require 'config.php';
?>

<!DOCTYPE html>
<html lang="en" ng-app="myApp">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/icon-ipercash.png" type="image/png" >

    <title>Ipercash | Plate forme de paiement de services et produits en ligne</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts  -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">

    <link href="css/agency.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css" >

    <style type="text/css">
      /*taille du nav*/
      @media (min-width: 992px){
        #mainNav {
          padding-top: 0px; 
          padding-bottom: 0px; 
          -webkit-transition: padding-top .3s,padding-bottom .3s;
          -moz-transition: padding-top .3s,padding-bottom .3s;
          transition: padding-top .3s,padding-bottom .3s;
          border: none;
        }
      }

      /*coleur du nav*/
      #mainNav {
        background: #949090;
      }
      @media (min-width: 992px){
        #mainNav.navbar-shrink {
          padding-top: 0;
          padding-bottom: 0;
          background-color: #949090;
        } 
      }

    /*  text style comment ca marche  */
      .cmt_ca_marche{
        margin-bottom: 1em;
        margin-top: 3em;
        /*margin-left: 37%;*/
        margin-left: auto;
        margin-right: auto;
        border-bottom: 3px solid red;
      }

      .btn-page{
        display: block;
        margin: auto;
        margin-top: 2em;
      }

      article{
        padding-bottom: 3em;
      }
    </style>
  
  </head>

<body id="page-top" ng-controller="translateController">
  <!-- nav -->
  <?php include('partials/nav.php');?>
    <article class="col-sm-12 ">
      <div class="container" >
        <div class="row">
          <h1 style="margin-top:3em;" class="cmt_ca_marche">{{'comment_ca_marche' | translate}}</h1>
          <div class="col-sm-12">
              <p style="display:block;padding-top:0px;margin-top:0px;color:#949090;">
              {{'comment_ca_marche_step_one' | translate}}
              </p>
              <p style="display:block;padding-top:0px;margin-top:0px;color:#949090;">
              {{'comment_ca_marche_step_two' | translate}}
              </p>
                <h5>{{'prérequis_pour_le_service' | translate}}</h5>
                <ul style="margin-left: 5%;">
                  <li>{{'prérequis_un_pour_le_service' | translate}}</li>
                  <li>{{'prérequis_deux_pour_le_service' | translate}}</li>
                  <li>{{'prérequis_trois_pour_le_service' | translate}}</li>
                </ul>
                <p style="display:block;padding-top:0px;margin-top:0px;color:#949090;">
                {{'comment_ca_marche_premiere_remarque' | translate}}
              </p>
            <br/>
            <h3 style="">{{'comment_ca_marche_step_three' | translate}} </h3>
            <hr/>
            <p style="display:block;padding-top:0px;margin-top:0px;color:#949090;">
            {{'comment_ca_marche_detail_one' | translate}}
            </p>
            <p style="display:block;padding-top:0px;margin-top:0px;color:#949090;">
            {{'comment_ca_marche_detail_two_section_one' | translate}} <br>
            {{'comment_ca_marche_detail_two_section_two' | translate}} <br>
            {{'comment_ca_marche_detail_two_section_three' | translate}}
              <br> {{'comment_ca_marche_detail_two_section_four' | translate}}
              <br> {{'comment_ca_marche_detail_two_section_five' | translate}}
              <br> {{'comment_ca_marche_detail_two_section_six' | translate}}
              <br> {{'comment_ca_marche_detail_two_section_seven' | translate}}
              <br> {{'comment_ca_marche_detail_two_section_eight' | translate}}
              <br> {{'comment_ca_marche_detail_two_section_nine' | translate}}
            </p>
          </div>
        </div>
      </div>
    </article>

   <!-- Contact -->
   <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class=" text-uppercase">{{'Contactez_nous' | translate}}</h2>
            <h3 class="section-subheading text-muted">{{'Ecrivez_nous' | translate}}</h3>
          </div>
        </div>
        <div class="row">
          <div class="offset-md-1 col-md-10">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="{{'Footer_form_name' | translate}} *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email1" type="email" placeholder="{{'Footer_form_email' | translate}} *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="{{'Footer_form_telwatsapp' | translate}}*" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="{{ 'Footer_form_message' | translate}} *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">{{'Envoyer_un_Message' | translate}}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php include('partials/footer.php');?>

    

  </body>

</html>
