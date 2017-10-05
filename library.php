<?php
include "head.php";
include "header.php";

// Si non connecté, redirection vers login.php
if (empty($_SESSION['pseudo'])){
    header('Location: login.php');
    exit();
}
?>
<div class="container">
    <div class="row">
    <h1>Série</h1>
    <h2><strong>Titre de la série : <?php $_SESSION['title']?></strong></h2>
    <p>Résumé: <?php $_SESSION['description'];?>
    </p>

</div>
</div>
<div class="container">

    <h3>[Name] Lorem Ipsum</h3>
    <div class="row lead evaluation">
        <div id="colorstar" class="starrr ratable" ></div>
        <span id="count">0</span> star(s) - <span id="meaning"> </span>

        <!--
                <div class='indicators' style="display:none">
                    <div id='textwr'>What went wrong?</div>
                    <input id="rate[]" name="rate[]" type="text" placeholder="" class="form-control input-md" style="display:none;">
                    <input id="rating[]" name="rating[]" type="text" placeholder="" class="form-control input-md rateval" style="display:none;">

                    <span class="button-checkbox">
                        <button type="button" class="btn criteria" data-color="info">Punctuallity</button>
                         <input type="checkbox" class="hidden"  />
                        </span>
                    <span class="button-checkbox">
                        <button type="button" class="btn criteria" data-color="info">Assistance</button>
                         <input type="checkbox" class="hidden"  />
                        </span>
                    <span class="button-checkbox">
                        <button type="button" class="btn criteria" data-color="info">Knowledge</button>
                         <input type="checkbox" class="hidden"  />
                        </span>-->
        </div>


    </div>



    <h3>[Name] Lorem Ipsum</h3>
    <div class="row lead evaluation">
        <div id="colorstar" class="starrr ratable" ></div>
        <span id="count">0</span> star(s) - <span id="meaning"> </span>

<!--
        <div class='indicators' style="display:none">
            <div id='textwr'>What went wrong?</div>
            <input id="rate[]" name="rate[]" type="text" placeholder="" class="form-control input-md" style="display:none;">
            <input id="rating[]" name="rating[]" type="text" placeholder="" class="form-control input-md rateval"  style="display:none;">

            <span class="button-checkbox">
                <button type="button" class="btn" data-color="info">Punctuallity</button>
                 <input type="checkbox" class="hidden"  />
                </span>
            <span class="button-checkbox">
                <button type="button" class="btn" data-color="info">Assistance</button>
                 <input type="checkbox" class="hidden"  />
                </span>
            <span class="button-checkbox">
                <button type="button" class="btn" data-color="info">Knowledge</button>
                 <input type="checkbox" class="hidden"  />
                </span>
        </div>-->


    </div>

</div>








<? include "footer.php";?>