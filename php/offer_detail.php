<?php
include_once "wishlist.php";
if(!isset($_GET["id_offer"]) || !offerExists($_GET["id_offer"])){
    header('HTTP/1.0 404 Not Found');
    $contents = file_get_contents('./error/404.php', TRUE);
    exit($contents);
}