<?php
require 'config.php';
require 'session.php';
require 'class/paypalExpress.php';
$paypalExpress = new paypalExpress();
$orders = $paypalExpress->orders();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/icon-ipercash.png" type="image/png" >

    <title>IPercash | Plate forme de paiement de services et produits en ligne</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
   
    <link href="css/orders.css" rel="stylesheet">
  </head>
  

  <body id="page-top">

    
  <!-- nav -->
  <?php include('partials/nav.php');?>
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
              <form method="" action="">
                  <div class="col-md-12">
                    <div class="from-group">
                      <label for="email">email<span class="text-danger">*</span></label>
                      <input type="email" name="email" id="email" class="form-control"  required/>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="from-group">
                      <label for="password">password<span class="text-danger">*</span></label>
                      <input  type="password" name="mdp" id="password" class="form-control"  required/>
                    </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>

    <article class="col-sm-12 ">
      <div class="container" >
      <div class="row">
        <h1 style="margin-top:3em;">Mes transferts</h1>
        <div class="col-sm-12">
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Service</th>
                <th scope="col">Montant</th>
                <th scope="col">Details</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <?php if($orders) { ?>
            <tbody>
            <?php foreach($orders as $order){  ?>
              <tr>
                <th scope="row">N° - <?php echo $order->oid; ?></th>
                <td>Transfert d'argent</td>
                <td><?php echo $order->montant ?> eur</td>
                <td><?php echo $order->dest_name.' - '.$order->dest_number; ?></td>
                <td><?php echo $paypalExpress->timeFormat($order->created); ?></td>
              </tr>
              <?php } ?>
            </tbody>
            <?php }  else { ?>
            <tr>
            <td> No Orders</td>
                <?php } ?>
            </tr>
            </table>
          </div>
        </div>
      </div>
    </article>
     <!-- Footer -->
    <?php include('partials/footer.php');?>
  </body>
</html>