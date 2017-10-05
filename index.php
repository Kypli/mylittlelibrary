<?php

// Connection DB

//Param
//$db = "mysql:host=localhost;dbname=AuPenDuick;charset=utf8";
//$user = "root";
//$password = "mysql01"; // Remplacer par votre password

//include "function/connect.php";
//$bdd = connect($db, $user, $password);

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

<?php
include "header.php";
include "pierre.php";
include "fabrice.php";
include "aurelie.php";
include "footer.php";
?>

<body>


<div class="container-fluid">
    <div class="row">
        <div class="media">
            <div class="col-md-6">
                <div class="media-left ">
                    <img class="media-object img-responsive" src="pictures/avatar2.png" alt="movies">
                </div>
            </div>
            <div class="col-md-5">
                <div class="media-body media-middle">
                    <h4 class="media-heading">Films</h4>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                        ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row music_zone">
        <div class="media">
            <div class="col-md-6">
                <div class="media-body media-middle text_music">
                    <h4 class="media-heading">Music</h4>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                        ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="media-right ">
                    <img class="media-object img-responsive" src="pictures/casque2.png" alt="movies">
                </div>
            </div>

        </div>
    </div>
</div>
</body>
