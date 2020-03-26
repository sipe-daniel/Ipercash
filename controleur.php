<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "config.php";
require "model.php";
require "class/paypalExpress.php";
$paypalExpress = new paypalExpress();
$model = new Ussd();

if(isset($_GET["action"]) && $_GET["action"] == "getCodeUssd"){
    $rep = $model->getUssdCode();
    //var_dump($rep);
    echo json_encode($rep);

}

if(isset($_GET["action"]) && $_GET["action"] == "setCodeUssd"){

    $id_ussd = $_GET['id'];
    $rep = $model->getUssdCode();
    
    echo json_encode($rep);

}

if(isset($_GET["action"]) && $_GET["action"] == "resto_email_code"){

    $email = $_POST['email_resto'];
    $rep = $paypalExpress->checkEmail($email);
    
    echo $rep;

}

if(isset($_GET["action"]) && $_GET["action"] == "checkPasswordCode"){

    $code = $_POST['verifyCode'];
    $newPassword = $_POST['newPassword'];
    $rep = $paypalExpress->activationPassword($code, $newPassword);
    
    echo $rep;
}

if(isset($_GET["action"]) && $_GET["action"] == "checkCode"){

    $code = $_POST['verifyCode'];
    $rep = $paypalExpress->activation($code);
    if($rep) {
        if($rep == 2) {
            echo 2;
        }
        else {
            echo 1;
        }
    }
    else {
        echo 0;
    }
}

if(isset($_GET["action"]) && $_GET["action"] == "login"){

    $usernameEmail = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
    {
        $paypalExpress = new paypalExpress();
        $uid=$paypalExpress->userLogin($usernameEmail,$password);
        if($uid)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    else {
        echo 2;
    }

}

if(isset($_GET["action"]) && $_GET["action"] == "createUser"){

    $username = htmlentities($_POST['nom']).' '.htmlentities($_POST['prenom']);
    $email = htmlentities($_POST['email_user']);
    $password = htmlentities($_POST['pass']);
    $pays = htmlentities($_POST['pays']);
    $ville = htmlentities($_POST['ville']);
    $adress = "";
    if(strlen(trim($username))>1 && strlen(trim($password))>1 && strlen(trim($email))>1 && strlen(trim($pays))>1)
    {
        $paypalExpress = new paypalExpress();
        $rep=$paypalExpress->createNewUser($username,$password,$email,$pays,$ville,$adress);
        
        if($rep)
        {
            $_SESSION['nom'] = htmlentities($_POST['nom']);
            $_SESSION['prenom'] = htmlentities($_POST['prenom']);
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    else
        {
            echo 2;
        }

}
