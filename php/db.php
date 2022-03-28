<?php

$dsn = "mysql:host=remotemysql.com;dbname=8aah0fCXko";
$user = "8aah0fCXko";
$passwd = "plduQUYNWg";
try{
    global $pdo; //pdo interface that will be used everywhere
    $pdo = new PDO($dsn, $user, $passwd);
}catch(Exception $e){
    echo "Erreur bdd : $e";
}
if (!function_exists('getVersion'))   {
    function getVersion($pdo){ //db tester to return version and to check db capacity to respond
        $stm = $pdo->query("SELECT VERSION()");
        $version = $stm->fetch();
        return $version[0] . PHP_EOL;
    }
  }