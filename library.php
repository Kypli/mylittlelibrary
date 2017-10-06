<?php
include "head.php";
include "header.php";

// Si non connecté, redirection vers login.php
if (empty($_SESSION['pseudo'])){
    header('Location: login.php');
    exit();
}
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">

                <h1>Série</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-3 favoris_button">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>
                                Ajouter à mes favoris
                            </button>
                        </div>
                        <h2><strong>Titre de la série : <?php $_SESSION['title'] ?></strong></h2>


                    </div>


                    <div class="row">
                        <div class="col-md-9 col-md-offset-1">
                            <div class="panel-body panel_zone"><h3 class="resume">
                                    Résumé: <?php $_SESSION['description']; ?>
                                </h3></div>

                        </div>
                        <div class="col-md-1 toggle_button">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="rating rating2"><!--
		--><a href="#5" title="Give 5 stars">★</a><!--
		--><a href="#4" title="Give 4 stars">★</a><!--
		--><a href="#3" title="Give 3 stars">★</a><!--
		--><a href="#2" title="Give 2 stars">★</a><!--
		--><a href="#1" title="Give 1 star">★</a>
                        </div>
                    </div>
                    <div class="row area">
                <textarea rows="4" cols="20" class="col-md-6 col-md-offset-3 comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "footer.php"; ?>