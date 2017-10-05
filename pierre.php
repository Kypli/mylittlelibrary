<?php
update("UPDATE Users SET pseudo = :pseudo, password = :password WHERE UsersId = :UsersId", array(":pseudo" => "pierre", ":password" => "aaa", ":UsersId" => 1));




?>