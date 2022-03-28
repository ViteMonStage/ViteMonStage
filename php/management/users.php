<?php
include_once "../db.php"; //Used to get global pdo
session_start();
if(isset($_POST['c_user'])){
    $email = $_POST['c_email'];
    if($_POST['c_password'] == $_POST['c_password_r'])//Check if the user typed his password correctly twice
    {
        $password= $_POST['c_password'];
    }
    else
    {
        header("Location: http://".$_SERVER['HTTP_HOST'].'/management/users.php?c_pass=1');
        die();
    }
    $firstname = $_POST['c_firstname'];
    $lastname = $_POST['c_lastname'];
    $birthday = $_POST['c_birthday'];
    $gender = $_POST['c_gender'];
    try {
        $stm = $pdo->prepare('INSERT INTO user VALUES (?,?,?,?,?,?,?,?,?,?)'); //prepared statement to verify email and password
        $stm->bindParam(1, $email);
        $stm->bindParam(2, $password);
        $stm->bindParam(3, $firstname);
        $stm->bindParam(4, $lastname);
        $stm->bindParam(5, $birthday);
        $stm->bindParam(6, $gender);
        $stm->bindParam(7, $id_role);
        $stm->bindParam(8, $id_promotion);
        $stm->bindParam(9, $id_permission);
        $stm->bindParam(10, $id_campus);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            header("Location: http://".$_SERVER['HTTP_HOST'].'/management/users.php?c_good=1');
        } else { //if  mail is not valid , returns error code 1
            header("Location: http://".$_SERVER['HTTP_HOST'].'/management/users.php?c_error=1');
        }
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
