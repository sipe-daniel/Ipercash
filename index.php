<?php
  require 'config.php';
?>

<html ng-app="myApp">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/icon-ipercash.png" type="image/png" >

    <title>IPercash | Plateforme de paiement de services et produits en ligne</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <link href="css/agency.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Alegreya Sans', sans-serif; }
    </style>
    <!-- end for select country flag -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
  
  </head>

  <body id="page-top" ng-controller="translateController">

    
    <!-- nav -->
    <?php include('partials/nav.php');?>
    <!-- Header -->
    <header class="masthead" id="acceuil">
      <div class="container">
        <div class="intro-text">
          <form class="form-inline">
              <div class="input-group-append btn-s">
                <a href="transfert.php" class="btn btn-primary btn-xl btn-sm btn-xs text-uppercase js-scroll-trigger link_transfert" style="padding: 12px 15px;"  role="button" title="Transfert vers le Cameroun" >{{'Envoyez_de_largent_maintenant' | translate}}</a> 
                <a href="transfert.php" class="btn btn-primary link_transfert1" role="button" title="Transfert vers le Cameroun" > {{'Envoyez_de_largent' | translate}} <i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
              </div>
          </form>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section>
      <h2 class="text-center">{{'Envoyez_de_largent_vers_Cameroun' | translate}}</h2>
      <div class="container">
        <img src="img/mobile-money.jpg" style="margin-left: auto; margin-right: auto; display: block; height:150px; padding-bottom:10px" />
      </div>
    </section>
    <br>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class=" text-uppercase">{{'Nos_atouts' | translate}}</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-3">
            <a class=" js-scroll-trigger" data-toggle="modal" href="#" data-target="#simpliciteModalCenter">
            <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-mouse-pointer fa-stack-1x fa-inverse" ></i>
              </span>
            </a>
            <h4 class="service-heading"><a class=" js-scroll-trigger" data-toggle="modal" href="#" data-target="#simpliciteModalCenter">{{'Simplicite' | translate}}</a></h4>
            <p class="text-muted">{{'Simplicite' | translate}} </p>
          </div>
          <div class="col-md-3">
            <a class=" js-scroll-trigger" data-toggle="modal" href="#" data-target="#rapiditeModalCenter">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-bolt fa-stack-1x fa-inverse"></i>
              </span>
            </a>
            <h4 class="service-heading"><a class=" js-scroll-trigger" data-toggle="modal" href="#" data-target="#rapiditeModalCenter">{{'Rapidite' | translate}}</a></h4>
            <p class="text-muted">{{'Rapidite_details' | translate}}</p>
          </div>
          <div class="col-md-3">

            <a class=" js-scroll-trigger" data-toggle="modal" href="#" data-target="#securiteModalCenter">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
              </span>
            </a>
            <h4 class="service-heading"><a class="js-scroll-trigger" data-toggle="modal" href="#" data-target="#securiteModalCenter">{{'Securite' | translate}}</a></h4>
            <p class="text-muted">{{'Securite_details' | translate}}</p>
          </div>
          <div class="col-md-3">

             <a class=" js-scroll-trigger" data-toggle="modal" href="#" data-target="#coutModalCenter">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-usd fa-stack-1x fa-inverse"></i>
              </span>
            </a>
            <h4 class="service-heading"><a class="js-scroll-trigger" data-toggle="modal" href="#" data-target="#coutModalCenter">{{'Moindre_cout' | translate}}</a></h4>
            <p class="text-muted">{{'Moindre_cout_details' | translate}} </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal Simplicite -->
    <div class="modal fade" id="simpliciteModalCenter" tabindex="-1" role="dialog" aria-labelledby="simpliciteModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="simplicitModaleLongTitle">{{'Simplicite' | translate}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p class="item__paragraph">
              {{'popup_Simplicite' | translate}}
              </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{'popup_Close' | translate}}</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Rapidité-->
   <div class="modal fade" id="rapiditeModalCenter" tabindex="-1" role="dialog" aria-labelledby="rapiditeModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rapiditeModalLongTitle">{{'Rapidite' | translate}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="item__paragraph">
            {{'popup_Rapidite' | translate}}
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{'popup_Close' | translate}}</button>
          </div>
        </div>
      </div>
    </div>

   <!-- Modal Rapidité-->
   <div class="modal fade" id="securiteModalCenter" tabindex="-1" role="dialog" aria-labelledby="securiteModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="securiteModalLongTitle">{{'Securite' | translate}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <p>
           {{'popup_Securite' | translate}}
           </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{'popup_Close' | translate}}</button>
          </div>
        </div>
      </div>
    </div>

   <!-- Modal Rapidité-->
   <div class="modal fade" id="coutModalCenter" tabindex="-1" role="dialog" aria-labelledby="coutModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="coutModalLongTitle">{{'Moindre_cout' | translate}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="item__paragraph">
              {{'popup_Moindre_cout' | translate}}
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{'popup_Close' | translate}}</button>
          </div>
        </div>
      </div>
    </div>

    <!-- service -->
    <section id="service-client" style="background-color:#f4f4f5;">
      <div class="container">
        <div class="col-lg-12 text-center">
          <h2 class=" text-uppercase">{{'Service_client' | translate}}</h2>
        </div>
         <div class="row text-center">
          <div class="col-md-3">
            <h4 class="text-muted" style="font-family:sans-serif;"><img src="img/email_blue_23344.png" width="33px" class="img-responsive icone"/> info@ipercash.fr</h4>
          </div>
          <div class="col-md-3">
            <h4 class="text-muted" style="font-family:sans-serif;"><img src="img/Phone_iOS.png" width="31px" class="img-responsive icone"/> +33 9 70 46 04 46</h4>
          </div>
          <div class="col-md-3">
            <h4 class="text-muted" style="font-family:sans-serif;"><img src="img/whatsapp_icon-icons.com_65942.png" width="30px" class="img-responsive icone"/> +33 7 56 92 26 96</h4>
          </div>
          <div class="col-md-3">
            <h4 class="text-muted" style="font-family:sans-serif;"><img src="img/images.jpeg" width="28px" class="img-responsive icone"/> 17 rue Pache 75011 Paris</h4>
          </div>
        </div>
      </div>
    </section>

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
  <?php require "partials/footer.php" ?>
  <!-- js select data flag -->
    <script>
      $(document).ready(function(){
        $(window).resize(function(){
          var width = $(window).width();
            if(width < 767){
              $(".link_transfert").hide();
              $(".pick_icone").hide();
              $(".link_transfert").css("display:none");
              $(".link_transfert1").show();
            }else if(width >= 768){
              $(".link_transfert1").hide();
              $(".pick_icone").show();
              $(".link_transfert").show();
            }
          });
      });

      function onChangeCallback(ctr){
        console.log("The country was changed: " + ctr);
      }

      $(document).ready(function () {
          $(".niceCountryInputSelector").each(function(i,e){
              new NiceCountryInput(e).init();
          });
      });
    </script>
  </body>
</html>
