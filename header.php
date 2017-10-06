<b<body>
<h<header>
    <?php

    // Vérification d'inscription
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

        // On vérifie si le pseudo existe
        $reponse = $bdd->query("SELECT count(Pseudo) FROM Users WHERE Pseudo = '".$cleanPost['pseudo']."' AND Password = '".$cleanPost['password']."'") or die(print_r($bdd->errorInfo()));
        while ($data = $reponse->fetch()) {

            // Si == 1, La personne existe en BDD
            if ($data['count(Pseudo)'] == 1) {
                // Mettre en sessions
                $_SESSION['pseudo'] = $cleanPost['pseudo'];
                $_SESSION['password'] = $cleanPost['password'];
            } else {
                $errors[] = 'Ce pseudo n\'existe pas';
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

    // Si connecté
    if (!empty($_SESSION['pseudo'])){
        ?>
        <div class="container-fluid header">
            <div class="row">
                <img src="pictures/logo2.png" alt="logo" class="col-sm-1 col-xs-12 logo"/>
                <h2 class="col-sm-4 col-xs-12 mll">MyLittleLibrary</h2>
                <p class="col-sm-4 myname">Bienvenue <?= ucfirst($_SESSION['pseudo']) ?></br>
                    <a class="button" href="index.php"> <button type="button">Retour accueil</button> </a>
                    <a class="button" href="list.php"> <button type="button">Mes Listes</button> </a>
                    <a class="button" href="library.php"> <button type="button">Ma Librairie</button> </a>
                </p>
                <form action="#" method="post" class="col-sm-3 deconnect">
                    <input type="text" style="display:none" name="deconnexion" value="deco"/>
                    <input type="submit" value="Deconnexion"/>
                </form>

            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="container-fluid header">
            <div class="row">
                <img src="pictures/logo2.png" alt="logo" class="col-sm-1 col-xs-12 logo"/>
                <h2 class="col-sm-4 col-xs- mll">MyLittleLibrary</h2>
                <form action="#" method="post" class="col-sm-5 col-xs-12 connexion_bloc">
                    <input type="text" name="pseudo" placeholder="Pseudo">
                    <input type="password" name="password" placeholder="mot de passe">
                    <input type="submit" name="btnSubmit" value="Connexion">
                </form>
                <p class="col-sm-2 col-xs-12"><a href="login.php">inscription</a></p>
            </div>
        </div>
        <?php
    }
    ?>

</header>

