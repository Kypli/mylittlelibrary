<?php
include "head.php";
include "header.php";

// Si non connecté, redirection vers login.php
if (empty($_SESSION['pseudo'])){
    header('Location: index.php');
    exit();
}

// Ajout Favori
if (!empty($_POST['favori'])){

    // Ajouter aux favori
    $req = $bdd->prepare("INSERT INTO Favorite (User, Library, LibraryProduct) VALUES(:User, :Library, :LibraryProduct)");
    $req->execute(array(
        "User" => $_SESSION['id'],
        "Library" => 1,
        "LibraryProduct" => $_POST['favori'],
    )) or die(print_r($req->errorInfo()));
}
?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">

            <h1>Série</h1>
        </div>

    </div>
<?php
$reponse = $bdd->query("SELECT * FROM LibraryMovies WHERE user = '".$_SESSION['id']."' ORDER BY LibraryMoviesId ASC") or die(print_r($bdd->errorInfo()));
while ($data = $reponse->fetch()) {

    // Liste favori
    $favori = false;
    $reponse2 = $bdd->query("SELECT * FROM Favorite WHERE User = '".$_SESSION['id']."' AND LibraryProduct = '".$data['LibraryMoviesId']."'") or die(print_r($bdd->errorInfo()));
    while ($data2 = $reponse2->fetch()) { $favori = true; }$reponse2->closeCursor();
    ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-md-3 favoris_button">
                        <?php
                        if (!$favori) {
                            ?>
                            <form action="#" method="post">
                                <input type="text" name="favori" style="display:none"
                                       value="<?= $data['LibraryMoviesId'] ?>"/>
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> Ajouter à mes favoris
                                </button>
                            </form>
                            <?php
                        } else {
                            echo 'Dans vos favoris';
                        }
                            ?>
                        </div>
                    <h2><strong><?= $data['name'] ?></strong></h2>


                </div>


                <div class="row">
                    <div class="col-md-9 col-md-offset-1">
                        <div class="panel-body panel_zone"><h3 class="resume">
                                <?= $data['description']; ?>
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
                <textarea rows="4" cols="20" class="col-md-6 col-md-offset-3 comment">Votre commentaire ici.
                </textarea>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php } include "footer.php"; ?>