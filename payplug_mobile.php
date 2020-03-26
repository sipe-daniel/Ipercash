<?php
 session_start();
 error_reporting(E_ALL);
ini_set('display_errors', 1);
$secretkey = 'sk_test_4CrTdSEgRg2woqYSyJM0Hd';
$montant = htmlspecialchars($_SESSION['somme']*100);
$email = htmlspecialchars($_SESSION['email']);
$username = explode(" ", $_SESSION['nom']);
$nom = htmlspecialchars($username[1]);
$prenom = htmlspecialchars($username[0]);

require_once('payplug/lib/init.php');
\Payplug\Payplug::setSecretKey($secretkey);

$payment = \Payplug\Payment::create(array(
    'amount'         => intval($montant),
    'currency'       => 'EUR',
    'customer'       => array(
        'email'      => ''.$email.'',
        'first_name' => ''.$prenom.'',
        'last_name'  => ''.$nom.''
    ),
    "hosted_payment" => array(
        "return_url" => "http://51.83.45.133/success.php",
        "cancel_url" => "http://51.83.45.133/cancel.html"
    ),
    'notification_url' => 'http://51.83.45.133/notification_payplug.php'
    
));

$_SESSION['paymentid'] = $payment->id; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>PayPlug Lightbox example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
<script type="text/javascript" src="https://api.payplug.com/js/1.0/form.js"></script>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    [].forEach.call(document.querySelectorAll("#signupForm"), function(el) {
      el.addEventListener('submit', function(event) {
        var payplug_url = '<?= $payment->hosted_payment->payment_url ?>';
        Payplug.showPayment(payplug_url);
        event.preventDefault();
      })
    })
  })
</script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class='col-md-12'>
        <h1><i class="fa fa-flask"></i> PayPlug Lightbox example</h1>
        <hr />
        <p>Welcome,</p>
        <p>This example is creating a payment of 1€.</p>
      </div>
      <div class='col-md-4'>
          <form action="" method="post" id="signupForm" class="formulaire" novalidate>
            <p>
              <button type="submit" class="btn btn-default">Buy now</button>
            </p>
          </form>
      </div>
    </div>
  </div>
</body>
</html>