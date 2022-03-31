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
    $stm = $pdo->prepare('SELECT email,id_role,password,id_user,firstname,lastname FROM user WHERE email=? AND password=?'); //prepared statement to verify email and password
    $stm->bindParam(1, $email);
    $stm->bindParam(2, $password);
    $stm->execute();
    $row = $stm->fetchAll();

    if ($row[0][3] == 2) {
        $stm = $pdo->prepare('SELECT search_company, create_company, modify_company, evaluate_company, delete_company, stats_company, search_offer, create_offer, modify_offer, delete_offer, stats_offer, search_pilot, create_pilot, modify_pilot, delete_pilot, search_delegate, create_delegate, modify_delegate, delete_delegate, search_student, create_student, modify_student, delete_student, stats_student FROM permission WHERE id_user = ?'); //prepared statement to verify email and password
        $stm->bindParam(1, $row[0][3]);
        $stm->execute();
        $row1 = $stm->fetchAll();
    }
    if (isset($row[0]) == 1 && isset($row[0]) == 1) {
        header('Location: ../index.php');
        $_SESSION['email'] = $email; //if password and mail are a valid couple, grant access by setting session email value
        $_SESSION['role'] = $row[0][1];
        $_SESSION['id_user'] = $row[0][3];
        $_SESSION['name'] = $row[0][4] . " " . $row[0][5];
        if ($row[0][3] == 2) {
            $_SESSION['search_company'] = $row1[0][0];
            $_SESSION['create_company'] = $row1[0][1];
            $_SESSION['modify_company'] = $row1[0][2];
            $_SESSION['evaluate_company'] = $row1[0][3];
            $_SESSION['delete_company'] = $row1[0][4];
            $_SESSION['stats_company'] = $row1[0][5];
            $_SESSION['search_offer'] = $row1[0][6];
            $_SESSION['create_offer'] = $row1[0][7];
            $_SESSION['modify_offer'] = $row1[0][8];
            $_SESSION['delete_offer'] = $row1[0][9];
            $_SESSION['stats_offer'] = $row1[0][10];
            $_SESSION['search_pilot'] = $row1[0][11];
            $_SESSION['create_pilot'] = $row1[0][12];
            $_SESSION['modify_pilot'] = $row1[0][13];
            $_SESSION['delete_pilot'] = $row1[0][14];
            $_SESSION['search_delegate'] = $row1[0][15];
            $_SESSION['create_delegate'] = $row1[0][16];
            $_SESSION['modify_delegate'] = $row1[0][17];
            $_SESSION['delete_delegate'] = $row1[0][18];
            $_SESSION['search_student'] = $row1[0][19];
            $_SESSION['create_student'] = $row1[0][20];
            $_SESSION['modify_student'] = $row1[0][21];
            $_SESSION['delete_student'] = $row1[0][22];
            $_SESSION['stats_student'] = $row1[0][23];
        }
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
