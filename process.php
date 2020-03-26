<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require 'config.php';
    require 'session.php';
    require 'class/paypalExpress.php';
    if(!empty($_GET['paymentID']) && !empty($_GET['payerID']) && !empty($_GET['token']) && !empty($_GET['pid']) ){
        $paypalExpress = new paypalExpress();
        $paymentID = $_GET['paymentID'];
        $payerID = $_GET['payerID'];
        $token = $_GET['token'];
        $pid = $_GET['pid'];
        $dest_number = $_GET['tel'];
        $dest_name = $_GET['dest_name'];
    
        $paypalCheck=$paypalExpress->paypalCheck($paymentID, $pid, $payerID, $dest_name, $dest_number, $token);
        //var_dump($paypalCheck);
        //exit;
        if($paypalCheck){
            
            echo '<script>window.location ="orders.php"</script>';
        }
        
    }
    else{
        echo '<script>window.location ="home.php"</script>';
    }
?>