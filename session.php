<?php
    /* header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json'); */
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $sesson_uid = '';
    if(!empty($_SESSION['session_uid'])){
        $sesson_uid = $_SESSION['session_uid'];
    }
    else{
        header('Location:index.php');
    }

    if(isset($_POST['action'])) {
        session_start();
        $_SESSION['nom_client'] = $_POST['nom_client'];
        $_SESSION['prenom_client'] = $_POST['prenom_client'];
        $_SESSION['client_tel'] = $_POST['tel_client'];
    }
?>