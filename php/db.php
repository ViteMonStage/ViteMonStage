<?php

$dsn = "mysql:host=remotemysql.com;dbname=8aah0fCXko";
$user = "8aah0fCXko";
$passwd = "plduQUYNWg";
global $pdo;
$pdo = new PDO($dsn, $user, $passwd);

function getVersion($pdo){
    $stm = $pdo->query("SELECT VERSION()");
    $version = $stm->fetch();
    return $version[0] . PHP_EOL;
}

?>