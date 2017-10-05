<?php
include "head.php";
include "header.php";

// Si non connecté, redirection vers login.php
if (empty($_SESSION['pseudo'])) {
    header('Location: login.php');
    exit();
}
?>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h1>Série</h1>
            </div>
            <div class="col-xs-6">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter à
                    mes favoris
                </button>
            </div>
        </div>
        <div class="row">
            <h2><strong>Titre de la série : <?php $_SESSION['title'] ?></strong></h2>
            <p>Résumé: <?php $_SESSION['description']; ?>
            </p>
        </div>
        <div class="row">
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>

        <div class="rating rating2"><!--
		--><a href="#5" title="Give 5 stars">★</a><!--
		--><a href="#4" title="Give 4 stars">★</a><!--
		--><a href="#3" title="Give 3 stars">★</a><!--
		--><a href="#2" title="Give 2 stars">★</a><!--
		--><a href="#1" title="Give 1 star">★</a>
        </div>
        <div class="row">
            <div class="col-md-10 col-offset-md-1">
        <textarea rows="15" cols="50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        </textarea>
            </div>
        </div>
    </div>


<?php include "footer.php"; ?>