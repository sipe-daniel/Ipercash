<?php
error_reporting(-1);
ini_set('display_errors', 'On');
// set_error_handler("var_dump");

class paypalExpress
{

    function timeFormat($ts)
    {
    $date = new DateTime("@$ts"); 
    $finalDate=$date->format('M d-Y H:i');
    return $finalDate;
    }

    /* User Login Check */
    public function userLogin($email,$password)
    { 
        $db = getDB();
        $hash_password= hash('sha256', $password);
        $stmt = $db->prepare("SELECT * FROM users WHERE  email=:email and password=:hash_password");
        $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
        $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        // var_dump($data); exit;
        
        
        if($stmt->rowCount() == 1)
        {
            if($data->actif != 1) {
                return 2;
            }
            else {
                $_SESSION['session_uid'] = $data->uid;
                $_SESSION["nom"] = $data->username;
                $_SESSION["prenom"] = $data->username;
                $_SESSION["email"] = $data->email;
                return $data;
            }
            
        }
        else
        {
            return false;
        }
        $db = null;
    }

    public function createNewUser($username,$password,$email,$pays,$ville,$adress){
        $db = getDB();
        $password = hash('sha256', $password);
        $actif = (rand(1000,9999));
        $stmt = $db->prepare("INSERT INTO users(username,password,email,pays,ville,adress,actif) VALUES(:username,:password,:email,:pays,:ville,:adress,:actif)");
        $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
        $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
        $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
        $stmt->bindParam("pays", $pays,PDO::PARAM_STR) ;
        $stmt->bindParam("ville", $ville,PDO::PARAM_STR) ;
        $stmt->bindParam("adress", $adress,PDO::PARAM_STR) ;
        $stmt->bindParam("actif", $actif,PDO::PARAM_INT) ;
        $stmt->execute();
        
        
        $_SESSION["nom"] = $username;
        $_SESSION["email"] = $email;
        $db = null;
      
            /* $to = $email; 
            $from = 'info@ipercast.fr'; 
            
            $subject = "Code de vérification"; 
            $fromName = "IPERCash";
            
            $message = '<html><body>';
            $message .= '<h2>Bienvenu sur IPERCash</h2>';
            $message .= '<img src="http://ipercash.fr/img/new_logo.jpeg" alt="Website Change Request" width="400" /><br/>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Code Vérification:</strong> </td><td><strong>" . $actif . "</strong></td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            
            // Set content-type header for sending HTML email 
            $headers = "From: $fromName <$from>\r\n".
               "MIME-Version: 1.0" . "\r\n" .
               "Content-type: text/html; charset=UTF-8" . "\r\n";
            
            // Send email 
            if(mail($to, $subject, $message, $headers)){ 
                return 1;
            }else{
            echo 'Email sending failed.'; 
            }
             */

            // $to  = $email; // notez la virgule

            // Sujet
            // $subject = 'Calendrier des anniversaires pour Août';
       
            $subject = 'CODE DE VERIFICATION';
            // $message = 'Salut!. Votre code d\'activation est :' . $actif;
            $message = '<html><body>';
            $message .= '<h2>Bienvenue sur IPERCash</h2>';
            $message .= '<img src="http://ipercash.fr/img/new_logo.jpeg" alt="Website Change Request" width="400" /><br/>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Code Vérification:</strong> </td><td><strong>" . $actif . "</strong></td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $headers = 'From: IPERCash <contact@ipercash.fr>' . "\r\n" .
            'Reply-To: contact@ipercash.fr' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    // echo (mail($to, $subject, $message, $headers)) ? 1 : 'Message not sent!';
       
            // Envoi
            if(mail($email, $subject, $message, $headers)) {
                return 1;
            } else{
                return 2; 
            }
    }

    public function checkEmail($email) {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam("email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        // var_dump($data);

        if($stmt->rowCount() > 0) {
            $id = intval($data->uid);
            $code = (rand(1000,9999));
            $stmt2 = $db->prepare("UPDATE users SET code_password = :code WHERE uid = :id");
            $stmt2->bindParam("id", $id, PDO::PARAM_INT);
            $stmt2->bindParam("code", $code, PDO::PARAM_INT);
            $stmt2->execute();
            // var_dump($id);
            $subject = 'RECUPERATION MOT DE PASSE';
            // $message = 'Salut!. Votre code d\'activation est :' . $actif;
            $message = '<html><body>';
            $message .= '<h2>Bienvenue sur IPERCash</h2>';
            $message .= '<img src="http://ipercash.fr/img/new_logo.jpeg" alt="Website Change Request" width="400" /><br/>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Votre code de récupération du mot de passe est:</strong> </td><td><strong>" . $code . "</strong></td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $headers = 'From: IPERCash <contact@ipercash.fr>' . "\r\n" .
            'Reply-To: contact@ipercash.fr' . "\r\n" .
            'Content-type: text/html; charset=charset=UTF-8' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    // echo (mail($to, $subject, $message, $headers)) ? 1 : 'Message not sent!';
       
            // Envoi
            if(mail($email, $subject, $message, $headers)) {
                return 1;
            } else{
                return 3; 
            }
        }
        else {
            return 2;
        }
    }

    public function activationPassword($code_password, $newPassword)
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE code_password = :code_password");
        $stmt->bindParam("code_password", $code_password, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        // var_dump($data);

        if($stmt->rowCount()==1) {
            $id = intval($data->uid);
            $password = hash('sha256', $newPassword);
            // var_dump($id);
            $stmt2 = $db->prepare("UPDATE users SET code_password = 1, password = :password WHERE uid = :id");
            $stmt2->bindParam("id", $id, PDO::PARAM_INT);
            $stmt2->bindParam("password", $password, PDO::PARAM_STR);
            $stmt2->execute();
            $_SESSION['session_uid'] = $id;
            $_SESSION["nom"] = $data->username;
            $_SESSION["email"] = $data->email;
            return 1;
        }
        else {
            return 2;
        }  
    }

    public function activation($actif)
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE actif = :actif");
        $stmt->bindParam("actif", $actif, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        // var_dump($data);

        if($stmt->rowCount()==1) {
            $id = intval($data->uid);
            // var_dump($id);
            $stmt2 = $db->prepare("UPDATE users SET actif = 1 WHERE uid = :id");
            $stmt2->bindParam("id", $id, PDO::PARAM_INT);
            $stmt2->execute();
            $_SESSION['session_uid'] = $id;
            $_SESSION["nom"] = $data->username;
            $_SESSION["email"] = $data->email;
            return 1;
        }
        else {
            return 2;
        }  
    }

    public function getAllProducts()
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM products");
        $stmt->bindParam("pid", $pid, PDO::PARAM_INT) ;
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db=null;
        return $data;
        
    }

    public function getUser($id) {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE uid = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT) ;
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $db=null;
        return $data;
    }

    public function getProduct($pid)
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM products WHERE pid=:pid");
        $stmt->bindParam("pid", $pid, PDO::PARAM_INT) ;
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $db=null;
        return $data;
        
    }

    public function pyamentCheck($paymentID)
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM orders WHERE paymentID=:paymentID");
        $stmt->bindParam("paymentID", $paymentID, PDO::PARAM_STR) ;
        $stmt->execute();
        $count = $stmt->rowcount();
        $db=null;
        return $count;
        
    }

    public function orders()
    {
        $uid = $_SESSION['session_uid'];
        $db = getDB();
        $stmt = $db->prepare("SELECT *  FROM orders O WHERE O.uid_fk =:uid  ORDER BY O.created DESC");
        $stmt->bindParam("uid", $uid, PDO::PARAM_INT) ;
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db=null;
        return $data;
        
    }

    public function updateOrder($pid, $payerID, $paymentID, $dest_name, $dest_number, $token)
    {
        $uid = $_SESSION['session_uid'];
        $montant = $_SESSION['somme'];
        $montant_client = $_SESSION['montant_xaf'];
        $db = getDB();
        
        $stmt = $db->prepare("INSERT INTO orders(uid_fk, pid_fk, payerID, paymentID, dest_name, dest_number, montant, token, created ) VALUES (:uid, :pid,:payerID, :paymentID, :dest_name, :dest_number, :montant, :token, :created)");
        $stmt->bindParam("paymentID", $paymentID, PDO::PARAM_STR) ;
        $stmt->bindParam("payerID", $payerID, PDO::PARAM_STR) ;
        $stmt->bindParam("dest_name", $dest_name, PDO::PARAM_STR) ;
        $stmt->bindParam("dest_number", $dest_number, PDO::PARAM_STR) ;
        $stmt->bindParam("montant", $montant, PDO::PARAM_STR) ;
        $stmt->bindParam("token", $token, PDO::PARAM_STR) ;
        $stmt->bindParam("pid", $pid, PDO::PARAM_INT) ;
        $stmt->bindParam("uid", $uid, PDO::PARAM_INT) ;
        $created = time();
        $stmt->bindParam("created", $created, PDO::PARAM_INT) ;
        $stmt->execute();

        $array = array_map('intval', str_split($dest_number)); 
        // var_dump($array);
        if($array[1] == 5 &&  $array[2] < 5) {
            $type_operateur = 2;
            $code_ussd = "*126*1*1*".$dest_number."*".$montant_client."*1008#";
        }
        
        if($array[1] == 5 &&  $array[2] >= 5) {
            $type_operateur = 1;
            $code_ussd = "#150*11*".$dest_number."*".$montant_client."*1008#";
        }

        if($array[1] == 7) {
            $type_operateur = 2;
            $code_ussd = "*126*1*1*".$dest_number."*".$montant_client."*1008#";
        }

        if($array[1] == 9) {
            $type_operateur = 1;
            $code_ussd = "#150*11*".$dest_number."*".$montant_client."*1008#";
        }

        $type_operateur = 1;
        $stmt1 = $db->prepare("INSERT INTO ussd (code_ussd, type_operateur) 
        VALUES (:code_ussd, :type_operateur)");
        $stmt1->bindParam(':code_ussd', $code_ussd);
        $stmt1->bindParam(':type_operateur', $type_operateur);
        $stmt1->execute();
        
        $db=null;
        unset($_SESSION['somme']);
        unset($_SESSION['service']);
        unset($_SESSION['paymentid']);
        unset($_SESSION['client_tel']);
        unset($_SESSION['nom_client']);
        unset($_SESSION['prenom_client']);
        unset($_SESSION['montant_client']);
        return true;

    }
    
    public function paypalCheck($paymentID, $pid, $payerID, $dest_name, $dest_number, $paymentToken){
        
        $ch = curl_init();
        $clientId = PayPal_CLIENT_ID;
        $secret = PayPal_SECRET;
        curl_setopt($ch, CURLOPT_URL, PayPal_BASE_URL.'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $clientId . ":" . $secret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $result = curl_exec($ch);
        $accessToken = null;
        

        if (empty($result)){
            return false;
        }
        
        else {
            $json = json_decode($result);
            $accessToken = $json->access_token;
            $curl = curl_init(PayPal_BASE_URL.'payments/payment/' . $paymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json',
            'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            $result = json_decode($response);
            
            
            $state = $result->state;
            $total = $result->transactions[0]->amount->total;
            $currency = $result->transactions[0]->amount->currency;
            $subtotal = $result->transactions[0]->amount->details->subtotal;
            $recipient_name = $result->transactions[0]->item_list->shipping_address->recipient_name;
            curl_close($ch);
            curl_close($curl);
            
            $product = $this->getProduct($pid);
            
            if($state == 'approved' && $currency == $product->currency && $_SESSION['somme'] ==  $subtotal){
                $this->updateOrder($pid, $payerID, $paymentID, $dest_name, $dest_number, $paymentToken);
                return true;   
            }
            else{
                return false;
            }
            
        }
        
    }
    
    
}


?>