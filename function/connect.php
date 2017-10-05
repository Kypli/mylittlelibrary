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

//    connect("mysql:host=localhost;dbname=MyLittleLibrary;charset=utf8", "root","mysql01");
//    $req = $_SESSION['db']->prepare($statement);
//    $req->execute($conditions) or die(print_r($req->errorInfo()));
//    $req->closeCursor();
}