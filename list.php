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
    $disabled = 'disabled="disabled"';
} else {
    $disabled = '';
}

// Rajouter le choix en BDD
    // SERIE
      // A FAIRE
    // MUSIC
        // A FAIRE

?>
<!----------->
<!--SERIE---->
<!----------->
<p class="underline">Rajouter une série à ma librairie</p>

<table>
    <?php
    for ($i = ($seriePage*10 - 9); $i <= ($seriePage*10); $i++){

        if ($i != 3) {
            $method = 'get';
            $BetaSeriecontent = connectionApiBetaSerie($method, $i);
            $betaSerieDetails = getDetailContentBetaSerie($BetaSeriecontent);

            ?>
            <tr>
                <th class="center"><span class="title"><?= $betaSerieDetails['title'] ?></span></th>
                <td><?= substr($betaSerieDetails['description'], 0, 120) ?>...</td>
                <td>
                    <form id="serie<?= $i ?>" action='#' method='post'>
                        <input type='text' name='serie' style='display:none' value='<?= $i ?>'/>
                        <input type='submit' value='Ajouter cette série à ma librairie'/>
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

<!----------->
<!--MUSIQUE-->
<!----------->
<p class="underline">Rajouter une musique à ma librairie</p>

<table>
    <?php
    for ($i = ($seriePage*10 - 9); $i <= ($seriePage*10); $i++){

        if ($i != 3) {
            $method = 'post';
            $BetaSeriecontent = connectionApiLastFm($method);
            $betaSerieDetails = getDetailContentLastFm($BetaSeriecontent);
            ?>
            <tr>
                <th class="center"><span class="title"><?= $betaSerieDetails['name']; ?></span></th>
                <td><?= substr($betaSerieDetails['artist'], 0, 120) ?></td>
                <td>
                    <form id="serie<?= $i ?>" action='#' method='post'>
                        <input type='text' name='serie' style='display:none' value='<?= $i ?>'/>
                        <input type='submit' value='Ajouter cette musique à ma librairie'/>
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




<?php

include "footer.php";