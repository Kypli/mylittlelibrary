<?php
include "head.php";
include "header.php";
include "welcome.php";
include "footer.php";

$method = 'get';
$path = 'shows/display';
$id = 1;
var_dump($content = connectionApi($method, $path, $id));
$list = getDetailContent($content);
var_dump($list)

?>
