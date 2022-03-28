<?php
if(!isset($_GET["offer_id"])){
    header('HTTP/1.0 404 Not Found');
    $contents = file_get_contents('./error/404.php', TRUE);
    exit($contents);
}

?>