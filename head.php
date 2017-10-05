<?php
session_start();

// Autoload GuzzleHttp
require 'vendor/autoload.php';

// Connection DB
    // Param
    $_SESSION['pathDB'] = "mysql:host=localhost;dbname=MyLittleLibrary;charset=utf8";
    $_SESSION['userDB'] = "root";
    $_SESSION['passwordDB'] = "mysql01"; // Remplacer par votre password
    // Connection
    include "function/connect.php";
    $bdd = connect($_SESSION['pathDB'], $_SESSION['userDB'], $_SESSION['passwordDB']);

// CleanPost
if($_POST) {
    foreach ($_POST as $key=>$value) {
        $cleanPost[$key] = trim(htmlentities($value));
    }
}

// Vérification si champs pseudo vide
if (empty($_POST['pseudo']) && !empty($_POST['password'])) {
    $errors[] = 'Merci d\'inscrire votre pseudo';
}

// Vérification si champs password vide
if (!empty($_POST['pseudo']) && empty($_POST['password'])) {
    $errors[] = 'Merci d\'inscrire votre mot de passe';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My little library</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/pierre.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="css/fabrice.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="css/aurelie.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
