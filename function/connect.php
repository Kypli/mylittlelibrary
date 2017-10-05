<?php

function connect(string $db, string $user, string $password) {

    try {
        $bdd = new PDO($db,$user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    } catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

function update($statement, $conditions){
    $bdd = connect($_SESSION['pathDB'], $_SESSION['userDB'],$_SESSION['passwordDB']);
    $req = $bdd->prepare($statement);
    $req->execute($conditions) or die(print_r($req->errorInfo()));
    $req->closeCursor();
}