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

if(isset($_GET["action"]) && $_GET["action"] == "login"){
    $data = json_decode(file_get_contents('php://input'), true);
    try {
        $usernameEmail = $data['username'];
        $password = $data['password'];
        if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
        {
            $paypalExpress = new paypalExpress();
            $userData = $paypalExpress->userLogin($usernameEmail,$password);
            if($userData)
            {
                $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            }
            else
            {
                echo '{"error":{"text":"Bad request wrong username and password"}}';
            }
        }
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

if(isset($_GET["action"]) && $_GET["action"] == "createUser"){
    $data = json_decode(file_get_contents('php://input'), true);
    try {
        $username = $data['name'].' '.$data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $pays = $data['pays'];
        $ville = $data['ville'];
        $adress = "";
        if(strlen(trim($username))>1 && strlen(trim($password))>1 && strlen(trim($email))>1 && strlen(trim($pays))>1)
        {
            $paypalExpress = new paypalExpress();
            $userData = $paypalExpress->createNewUser($username,$password,$email,$pays,$ville,$adress);
            if($userData){
            $userData = json_encode($userData);
            echo '{"userData": ' .$userData . '}';
            } else {
            echo '{"error":{"text":"Enter valid data"}}';
            }
        }
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}


if(isset($_GET['action']) && $_GET['action'] == "session")  {
    // session_start();
    $data = json_decode(file_get_contents('php://input'), true);
    // var_dump($data); exit;
    $_SESSION['nom_client'] = $data['nom_client'];
    $_SESSION['prenom_client'] = $data['prenom_client'];
    $_SESSION['client_tel'] = $data['tel_client'];
    $_SESSION['service'] = $data['service'];
    $_SESSION['somme'] = $data['total'];
    $_SESSION['session_uid'] = $data['uid'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['nom'] = $data['username'];
    echo $_SESSION['nom_client'];
}
