<?php
include "head.php";

// Redirection si déjà connecté
if (!empty($_SESSION['pseudo'])){
    header('Location:index.php');
    exit();
}

// Vérification d'inscription
if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

    // On vérifie si personne d'autre n'a le même pseudo
    $reponse = $bdd->query("SELECT count(Pseudo) FROM Users WHERE Pseudo = '".$cleanPost['pseudo']."'") or die(print_r($bdd->errorInfo()));
    while ($data = $reponse->fetch()) {

        // Si == 0, personne d'autre n'a le même pseudo
        if ($data['count(Pseudo)'] == 0) {

            // Mettre en sessions
            $_SESSION['pseudo'] = $cleanPost['pseudo'];
            $_SESSION['password'] = $cleanPost['password'];

            // Mettre en BDD
            $req = $bdd->prepare("INSERT INTO Users (Pseudo, Password) VALUES(:Pseudo, :Password)");
            $req->execute(array(
                "Pseudo" => $_SESSION['pseudo'],
                "Password" => $_SESSION['password'],
            )) or die(print_r($req->errorInfo()));

        // Récup id
        $reponse = $bdd->query("SELECT UsersId FROM Users WHERE Pseudo = '".$_SESSION['pseudo']."' AND Password = '".$_SESSION['password']."' ORDER BY LibraryMoviesId ASC") or die(print_r($bdd->errorInfo()));
        while ($data = $reponse->fetch()) { $_SESSION['id'] = $data['UsersId']; }$reponse->closeCursor();

        } else {
            $errors[] = 'Ce pseudo est déjà pris';
        }
    }$reponse->closeCursor();
}

// Affiche les erreurs
if (!empty($errors)) {
    ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data - dismiss="alert" aria - hidden="true">&times;</button>
        <strong> Errors!</strong>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
}
?>

<!--Formulaire d'inscription-->
<div class="container  panel_identification">
    <form method="post" action="#">

        <div class="panel panel-default">
            <div class="panel-heading"><h1>Votre inscription</h1></div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pseudo">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pseudo" placeholder="Entrer votre pseudo">
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>

            </div>
        </div>

    </form>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-2 col-sm-offset-6 col-md-2 col-md-offset-6">
            <a href="index.php" class="btn btn-default text-center"><span class="glyphicon glyphicon-arrow-left"></span> Retour à l'accueil</a>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>
