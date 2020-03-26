<?php

class Ussd {

    public function getUssdCode(){
        $bdb = getDB();
        $sql = $bdb->prepare('SELECT * FROM ussd ORDER BY id_ussd DESC ');
        $sql->execute();
        $row=$sql->fetchAll(PDO::FETCH_ASSOC); 
        return $row;
    }

    public function setUssdCode($id_ussd){
        $bdb = getDB();
        $sql = $bdb->prepare('UPDATE ussd SET etat = 1 WHERE id_ussd = :id_ussd ');
        $sql->execute(array('id_ussd'=>$id_ussd));
        return "Modifier";
    }

    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    private function getBdd() {
        $bdd = new PDO('mysql:host=localhost;dbname=ipercash;charset=utf8', 'ipercashqvuser', 'JesusestRoi@2019', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
}