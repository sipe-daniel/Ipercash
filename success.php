<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require 'config.php';
    // require 'session.php';
    require 'class/paypalExpress.php';
    $paypalExpress = new paypalExpress();


    // var_dump($payment->is_paid);
    if(empty($_SESSION['paymentid'])){
        header('Location:index.php');
    }

    $payment_id = $_SESSION['paymentid'];
    $payment_data3 = $_SESSION['client_tel'];
    $payment_data4 = $_SESSION['session_uid'];
    $dest_name = $_SESSION['nom_client']." ".$_SESSION['prenom_client'];
    var_dump($_SESSION);

    $paypalCheck=$paypalExpress->updateOrder(2, $payment_data4, $payment_id, $dest_name, $payment_data3, $payment_id);
    // var_dump($paypalCheck);
    
    if($paypalCheck){
        header('Location:orders.php');
        // echo '<script>window.location ="orders.php"</script>';
    }

?>