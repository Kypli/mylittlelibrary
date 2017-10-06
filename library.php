<?php
include "head.php";
include "header.php";

// Si non connecté, redirection vers login.php
if (empty($_SESSION['pseudo'])){
    header('Location: index.php');
    exit();
}
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-offset-1">
                <h1>Série</h1>
            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter à
                    mes favoris</button>
            </div>
        </div>
        <?php
        $reponse = $bdd->query("SELECT * FROM LibraryMovies ORDER BY LibraryMoviesId ASC") or die(print_r($bdd->errorInfo()));
        while ($data = $reponse->fetch()) {
        ?>
        <div class="row">
            <div class="col-md-6">
                <h2><strong>Titre de la série : <?= $data['name'] ?></strong></h2>
            </div>
            <div class="col-md-6">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="resume">
                <p>Résumé: <?= $data['description']; ?></p>
            </div>
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
    <div class="row">
        <div class="col-md-10 col-offset-md-1">
            <label class="comment">
        <textarea rows="3" cols="50">ut aaute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariacia deserunt mollit anim id est laborum
        </textarea>
            </label>
        </div>
    </div>
<?php }$reponse->closeCursor();

include "footer.php"; ?>