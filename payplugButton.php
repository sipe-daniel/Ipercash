<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$secretkey = 'sk_test_4CrTdSEgRg2woqYSyJM0Hd';
$email = 'john.watson@example.net';
$first_name = 'John';
$last_name = 'Watson';

require_once('payplug/lib/init.php');
\Payplug\Payplug::setSecretKey($secretkey);

$payment = \Payplug\Payment::create(array(
    'amount'         => 100,
    'currency'       => 'EUR',
    'customer'       => array(
        'email'      => $email,
        'first_name' => $first_name,
        'last_name'  => $last_name
    ),
    "hosted_payment" => array(
        "return_url" => "https://example.net/success",
        "cancel_url" => "https://example.net/cancel"
    ),
    'notification_url' => 'https://example.net/notifications'
));
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