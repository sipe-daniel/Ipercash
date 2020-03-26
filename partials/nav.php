<script data-require="angular.js@1.3.8" data-semver="1.3.8" src="https://code.angularjs.org/1.3.8/angular.js"></script>
<script data-require="angular-translate@*" data-semver="2.5.0" src="https://cdn.rawgit.com/angular-translate/bower-angular-translate/2.5.0/angular-translate.js"></script>
<script src="js/script_language.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/new_logo.jpeg" alt="logo-Ipercash" title="logo" width="200em" height="50em" /></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive" ng-controller="translateController">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="transfert.php">{{'Envoyez_de_largent' | translate}}</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="comment_ca_marche.php">{{'comment_ca_marche' | translate}}</a>
        </li>
        
        
        <?php 
          if (isset($_SESSION['session_uid'])) {
            ?>

              <li class="dropdown nav-item">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hi <?= $_SESSION["nom"] ?>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="orders.php">Mes Transactions</a>
                  <a class="dropdown-item" href="deconnexion.php">Déconnexion</a>
                </div>
              </li>
              

            <?php
          }
          else {
            ?>

              <li class="nav-item">
              <!-- Button trigger modal -->
                <a class="nav-link js-scroll-trigger" data-toggle="modal" href="#portfolio" data-target="#exampleModalCenter">{{'Connexion' | translate}}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="inscription.php">{{'Inscription' | translate}}</a>
              </li>

            <?php
          }
        ?>
        <li class="nav-item">
          <a href='' ng-click="changeLanguage('fr')" class="flag flag-fr"></a>
          <a href='' ng-click="changeLanguage('en')" class="flag flag-en"></a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
