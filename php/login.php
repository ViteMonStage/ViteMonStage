<?php
include "./db.php"; //Used to get global pdo

session_start();
if (empty($_POST['email']) == true || empty($_POST['password']) == true) { //if password or mail not set, returns error code 2
    header('Location: ../login.php?error=2');
    return;
}
$email = $_POST['email'];
$password = $_POST['password'];
try {
    $stm = $pdo->prepare('SELECT email,id_role,password,id_user FROM user WHERE email=? AND password=?'); //prepared statement to verify email and password
    $stm->bindParam(1, $email);
    $stm->bindParam(2, $password);
    $stm->execute();
    $row = $stm->fetchAll();
    if (isset($row[0]) == 1) {
        header('Location: ../index.php');
        $_SESSION['email'] = $email; //if password and mail are a valid couple, grant access by setting session email value
        $_SESSION['role'] = $row[0][1];
        $_SESSION['id_user'] = $row[0][3];
    } else { //if password and mail are not a valid couple, returns error code 1
        header('Location: ../login.php?error=1');
    }
} catch (\PDOException $e) {
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}


function disconnect()
{
    session_destroy();
    header('Location: ../login.php');
}
