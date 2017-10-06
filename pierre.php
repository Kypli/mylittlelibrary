<?php
update("UPDATE Users SET pseudo = :pseudo, password = :password WHERE UsersId = :UsersId", array(":pseudo" => "pierre", ":password" => "aaa", ":UsersId" => 1));


//$method = 'get';
//$id = 5;
//$BetaSeriecontent = connectionApiBetaSerie($method, $id);
//$betaSerieDetails = getDetailContentBetaSerie($BetaSeriecontent);
//
//echo $betaSerieDetails['id'];


//$method = 'post';
//$artist = 'cher';
//$BetaSeriecontent = connectionApiLastFm($method, $artist);
//var_dump($betaSerieDetails = getDetailContentLastFm($BetaSeriecontent));
//echo $betaSerieDetails['name'];


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

?>