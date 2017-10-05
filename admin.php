<?php

// Connection DB

    // Param (En attente des identifiants du site, à sécuriser)
    $db = "mysql:host=localhost;dbname=AuPenDuick;charset=utf8";
    $user = "root";
    $password = "mysql01"; // Remplacer par votre password

    include "function/connect.php";
    $bdd = connect($db, $user, $password);

// CLEAN POST
if ($_POST) {
    foreach ($_POST as $key => $value) {
        $cleanPost[$key] = trim(htmlentities($value));
    }
}

// EDIT TEXT
if (!empty($cleanPost['editTextarea'])) {
    // Security ID
    $cleanPost['editTextareaId'] = (int) $cleanPost['editTextareaId'];
    // Update
    $req = $bdd->prepare("UPDATE text SET text=(?) WHERE id = '".$cleanPost['editTextareaId']."'"); $req->execute(array(
        $cleanPost['editTextarea'],
    )) or die(print_r($req->errorInfo()));
    // ValidMessage
    $validMessage = "Le texte '" . $cleanPost['editTextareaId'] . "' a bien été édité";
}

// EDIT PICTURE TITLE
if (!empty($cleanPost['editTitle'])) {
    // Security ID
    $cleanPost['editTitleId'] = (int) $cleanPost['editTitleId'];
    // Update
    $req = $bdd->prepare("UPDATE pictures SET name=(?) WHERE id = '".$cleanPost['editTitleId']."'"); $req->execute(array(
        $cleanPost['editTitle'],
    )) or die(print_r($req->errorInfo()));
    // ValidMessage
    $validMessage = "Le titre de la photo '" . $cleanPost['editTitleId'] . "' a bien été édité";
}

// EDIT PICTURE INTERNET
if (!empty($cleanPost['editPictureInternet'])) {
    // Security ID
    $cleanPost['editPictureInternetId'] = (int) $cleanPost['editPictureInternetId'];
    // Update
    $req = $bdd->prepare("UPDATE pictures SET InternetSrc=(?), LocalSrc=(?) WHERE id = '".$cleanPost['editPictureInternetId']."'"); $req->execute(array(
        $cleanPost['editPictureInternet'],
        '',
    )) or die(print_r($req->errorInfo()));
    // ValidMessage
    $validMessage = "La photo '" . $cleanPost['editPictureInternetId'] . "' a bien été téléchargée et remplace l'ancienne";
}

// EDIT PICTURE LOCAL
if (!empty($cleanPost['editPictureLocalId'])) {
    // Security ID
    $cleanPost['editPictureLocalId'] = (int) $cleanPost['editPictureLocalId'];

    // Si le fichier qu'on télécharge a le meme nom qu'un autre déja existant, l'ancien écrase le nouveau ?
        // Si oui, tout va bien
        // Si non, supprimer l'ancien fichier avant le transfert

    // Vérifier si l'extension est bien une extension d'image
        // A faire

    // Transfert
    move_uploaded_file($_FILES['editPictureLocal']['tmp_name'],"pictures/".$_FILES['editPictureLocal']['name']);
    // Update
    $req = $bdd->prepare("UPDATE pictures SET InternetSrc=(?), LocalSrc=(?) WHERE id = '".$cleanPost['editPictureLocalId']."'"); $req->execute(array(
        '',
        $_FILES['editPictureLocal']['name'],
    )) or die(print_r($req->errorInfo()));
    // ValidMessage
    $validMessage = "Le lien de la photo '" . $cleanPost['editPictureInternetId'] . "' a bien été édité";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Au Pen Duick - Admin</title>

    <link rel="stylesheet" type="text/css" media="all" href="css/admin.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php
if (!empty($validMessage)) {
   echo "<div class='validation'>" . $validMessage . "</div>";
}
?>

<section class="container">
    <div class="row">

        <!-- EDIT TEXT-->
        <h2>Liste des textes</h2>
        <?php
        $req = $bdd->query("SELECT * FROM text") or die(print_r($bdd->errorInfo()));
        while ($data = $req->fetch()) { ?>
            <div class="col-xs-12">
                <form id="formText<?= $data['id'] ?>" action="" method="post">
                    <fieldset class="form-group">
                        <label for="textarea<?= $data['id'] ?>">Texte <?= $data['id'] ?></label>
                        <textarea id="textarea<?= $data['id'] ?>" class="form-control" name="editTextarea" rows="4" cols="30"/>
                           <?= $data['text'] ?>
                        </textarea>
                    </fieldset>
                    <input type="text" class="hidden" name="editTextareaId" value="<?= $data['id'] ?>"/>
                    <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-edit"></span> Sauvegarder les changements</button>
                </form>
            </div>
        <?php } ?>

        <!-- EDIT PICTURES-->
        <h2>Liste des images</h2>
        <?php
        $req = $bdd->query("SELECT * FROM pictures") or die(print_r($bdd->errorInfo()));
        while ($data = $req->fetch()) {

            // Src local or internet ?
            if (empty($data['LocalSrc'])){
                $picturePath = $data['InternetSrc'];
            } else {
                $picturePath = "pictures/".$data['LocalSrc'];
            }

            if ($data['id'] != 1){
                ?><div class="col-xs-12"><hr class="bar"></div><?php
            }
        ?>

            <!-- INFOS -->
            <div class="col-xs-12">
                <form id="formPictures<?= $data['id'] ?>" action="" method="post">
                    Titre: <input type="text" class="limitInput" name="editTitle" value="<?= $data['name'] ?>"/> <button type="submit" class="btn btn-success">Changer le nom</button>
                    <input type="text" class="hidden" name="editTitleId" value="<?= $data['id'] ?>"/>
                </form>
            </div>
            <br/>
            <div class="col-xs-12">
                <img class="limitPicture" src="<?= $picturePath ?>" alt="<?= $data['picture'] ?>"/>
            </div>

            <!-- INTERNET-->
            <form id="formPictures<?= $data['id'] ?>" action="" method="post">
                <div class="col-xs-4 col-xs-offset-1">
                    <input type="text" class="limitInput" name="editPictureInternet" placeholder="Lien internet de l'image"/>
                    <input type="text" class="hidden" name="editPictureInternetId" value="<?= $data['id'] ?>"/>
                    <button type="submit" class="btn btn-success">Nouveau lien</button>
                </div>
            </form>

            <!-- CHOICE -->
            <div class="col-xs-2">
                <span class="glyphicon glyphicon-arrow-left"></span> Choisir <span class="glyphicon glyphicon-arrow-right"></span>
            </div>

            <!-- LOCAL-->
            <form id="formPicturesDL<?= $data['id'] ?>" action="" method="post" enctype="multipart/form-data">
                <div class="col-xs-3">
                    <input type='hidden' name='MAX_FILE_SIZE' value='5000000' />
                    <input type='file' name='editPictureLocal' />
                    <input type="text" class="hidden" name="editPictureLocalId" value="<?= $data['id'] ?>"/>
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-success">Télécharger l'image</button>
                </div>
            </form>
        <?php } ?>

        <!-- Back -->
        <div class="col-sm-2 col-sm-offset-1 col-md-2 col-md-offset-1 spaceBack">
            <a href="index.php" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Retour à l'accueil</a>
        </div>

    </div><!-- Row -->
</section>

</body>
</html>