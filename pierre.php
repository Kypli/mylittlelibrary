<?php
Update("UPDATE Users SET pseudo = :pseudo, password = :password", array(":id" => $_SESSION['id'], ":zone_x_destination" => $_POST['deplacement_carte_x'], ":zone_y_destination" => $_POST['deplacement_carte_y']));





?>