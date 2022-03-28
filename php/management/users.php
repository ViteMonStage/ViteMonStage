<?php
include "../db.php"; //Used to get global pdo
session_start();
if(isset($_POST['c_user'])){
    try {
        $stm = $pdo->prepare('SELECT email,id_role,password FROM user WHERE email=? AND password=?'); //prepared statement to verify email and password
        $stm->bindParam(1, $email);
        $stm->bindParam(2, $password);
        $stm->execute();
        $row = $stm->fetchAll();
        header("Location: http://".$_SERVER['HTTP_HOST'].'/management/users.php');
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}
if(isset($_POST['d_user']))
{
    $email = $_POST['d_email'];
    try {
        $stm = $pdo->prepare('SELECT email FROM user WHERE email=?'); //prepared statement to verify email and password
        $stm->bindParam(1, $email);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            $stm = $pdo->prepare('DELETE FROM user WHERE email=?'); //prepared statement to verify email and password
            $stm->bindParam(1, $email);
            $stm->execute();
            header("Location: http://".$_SERVER['HTTP_HOST'].'/management/users.php?d_good=1');
        } else { //if  mail is not valid , returns error code 1
            header("Location: http://".$_SERVER['HTTP_HOST'].'/management/users.php?d_error=1');
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}
if(isset($_POST['m_user']))
{
    try {
        $stm = $pdo->prepare('SELECT email,id_role,password FROM user WHERE email=? AND password=?'); //prepared statement to verify email and password
        $stm->bindParam(1, $email);
        $stm->bindParam(2, $password);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            header('Location: ../index.php');
            $_SESSION['email'] = $email; //if password and mail are a valid couple, grant access by setting session email value
            $_SESSION['role'] = $row[0][1];
        } else { //if password and mail are not a valid couple, returns error code 1
            header('Location: ../login.php?error=1');
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}
