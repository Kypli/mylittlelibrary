<?php
include "head.php";
include "header.php";

// Si non connecté, redirection vers login.php
if (empty($_SESSION['pseudo'])){
    header('Location: index.php');
    exit();
}

// Page Série
if (!empty($_POST['seriePage'])){
    $seriePage = $_POST['seriePage'];
} else {
    $seriePage = 1;
}

// Désactiver le bouton précédant
if ($seriePage == 1){
    $disabled = 'style=\'display:none\'"';
} else {
    $disabled = '';
}

// Rajouter le choix en BDD
if (!empty($_POST['serie'])){

    $BetaSeriecontent = connectionApiBetaSerie('get', $_POST['serie']);
    $betaSerieDetails = getDetailContentBetaSerie($BetaSeriecontent);

    $req = $bdd->prepare("INSERT INTO LibraryMovies (user, name, description) VALUES(:user, :name, :description)");
    $req->execute(array(
        "user" => $_SESSION['id'],
        "name" => $betaSerieDetails['title'],
        "description" => $betaSerieDetails['description'],
    )) or die(print_r($req->errorInfo()));
}



?>
<!----------->
<!--SERIE---->
<!----------->
<p class="underline">Rajouter une série à ma librairie</p>
<div id="decale">
    <table>
        <?php
        for ($i = ($seriePage*10 - 9); $i <= ($seriePage*10); $i++){

            if ($i != 3) {
                $BetaSeriecontent = connectionApiBetaSerie('get', $i);
                $betaSerieDetails = getDetailContentBetaSerie($BetaSeriecontent);

                ?>
                <tr class="TableauListTr">
                    <th class="center"><span class="title"><?= $betaSerieDetails['title'] ?></span></th>
                    <td><?= substr($betaSerieDetails['description'], 0, 120) ?>...</td>
                    <td>
                        <form id="serie<?= $i ?>" action='#' method='post'>
                            <input type='text' name='serie' style='display:none' value='<?= $i ?>'/>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"></span> Ajouter cette série à ma librairie
                            </button>
                        </form>
                    </td>
                 </tr>
                <?php
            }
        }
    ?>
        <tr>
            <form id="seriesuivant" action='#' method='post'>
                <input type='text' name='seriePage' style='display:none' value='<?= ($seriePage - 1) ?>'/>
                <input type='submit' value='10 précédants' <?= $disabled ?> />
            </form>
        </tr>
        <tr>
            <form id="serieprecedant" action='#' method='post'>
                <input type='text' name='seriePage' style='display:none' value='<?= ($seriePage + 1) ?>'/>
                <input type='submit' value='10 suivants'/>
            </form>
        </tr>
    </table>
</div>

<?php
include "footer.php";