<?php
ob_start();
if(!isset($_SESSION)) {
    session_start(); 
}

if(($_SESSION['role'])==1 || ($_SESSION['role']==5))
{
    header('HTTP/1.1 403 Unauthorized');
    $contents = file_get_contents('../error/403.php', TRUE);
    exit($contents);
}