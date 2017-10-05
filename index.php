<?php
include "head.php";
include "header.php";
include "welcome.php";
include "footer.php";

$method = 'get';
$path = 'shows/display';
$id = 1;
$content = connectionApi($method, $path, $id);
$apiDetails = getDetailContent($content);

echo $apiDetails['id'];

?>
