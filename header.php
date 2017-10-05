<body>
<header>
<div class="container-fluid">
    <img src="pictures/logo.png" alt="logo" class="col-sm-3 col-xs-12"/>
    <p class=" col-sm-3 col-xs-12">MyLittleLibrary</p>
    <form action="head.php" method="post" class="col-sm-5 col-xs-12">
        <input type="text" name="pseudo" placeholder="Pseudo">
        <input type="password" name="password" placeholder="mot de passe">
        <input type="submit" name="btnSubmit" value="Connexion">
    </form>
    <p class="col-sm-1 col-xs-12"><a href="login.php">inscription</a></p>
</div>
</header>



if (!empty($_SESSION['pseudo']){
        // Bonjour ...
} else {
//inscription/connection

}