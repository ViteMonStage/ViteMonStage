<?php
include "./db.php";
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $stm = $pdo->prepare('SELECT email,password FROM user WHERE email=? AND password=?');
        $stm->bindParam(1, $email);
        $stm->bindParam(2, $password);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            header('Location: ../index.php');
            $_SESSION['email'] = $email;
        } else {
            echo "ERREUR";
            header('Location: ../login.php?erreur=1');
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}


function disconnect(){
    session_destroy();
    header('Location: ../login.php');
}

?>