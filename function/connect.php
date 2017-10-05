<?php

function connect(string $db, string $user, string $password) {

    try {
        $bdd = new PDO($db,$user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    } catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}


?>