<?php
include "head.php";
include "header.php";


// Si non connecté, redirection vers login.php
if (empty($_SESSION['pseudo'])){
    header('Location: login.php');
    exit();
}







include "footer.php";