<?php
include_once "../db.php"; //Used to get global pdo
session_start();


//CREATE USER
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
    //prepared statement to get role id
    $stm = $pdo->prepare('SELECT id_role FROM role WHERE role = ?');
    $stm->bindParam(1, $_POST['c_role']);
    $stm->execute();
    $row = $stm->fetchAll();
    $id_role = $row[0][0];
    //get promotion id    
    switch ($_POST['c_promo']) {
        case 'CPIA1':
            $id_promotion = 5;
            break;
        case 'CPIA2 IT':
            $id_promotion = 1;
            break;
        case 'CPIA2 GEN':
            $id_promotion = 2;
            break;
        case 'CPIA2 BTP':
            $id_promotion = 3;
            break;
        case 'CPIA2 SA3':
            $id_promotion = 4;
            break;
    }
    //prepared statement to get campus id    
    $stm = $pdo->prepare('SELECT id_campus FROM campus WHERE campus_name = ?');
    $stm->bindParam(1, $_POST['c_campus']);
    $stm->execute();
    $row = $stm->fetchAll();
    $id_campus = $row[0][0];
    try {
        $stm = $pdo->prepare('INSERT INTO user VALUES (?,?,?,?,?,?,?,?,NULL,?)'); //prepared statement to verify email and password
        $stm->bindParam(1, $email);
        print_r($email);
        echo('<br>');

        $stm->bindParam(2, $password);
        print_r($password);
        echo('<br>');
        $stm->bindParam(3, $firstname);
        print_r($firstname);
        echo('<br>');

        $stm->bindParam(4, $lastname);
        print_r($lastname);
        echo('<br>');

        $stm->bindParam(5, $birthday);
        print_r($birthday);
        echo('<br>');

        $stm->bindParam(6, $gender);
        print_r($gender);
        echo('<br>');

        $stm->bindParam(7, $id_role);
        print_r($id_role);
        echo('<br>');

        $stm->bindParam(8, $id_promotion);
        print_r($id_promotion);
        echo('<br>');

        $stm->bindParam(9, $id_campus);
        print_r($id_campus);
        echo('<br>');

        $stm->execute();
        if($id_role == 2)
        {
            $stm = $pdo->prepare('SELECT id_user from user WHERE email = ?'); // We get the id from the user we just created
            $stm->bindParam(1, $email);
            $stm->execute();
            $row = $stm->fetchAll();
            $id_user = $row[0][1];

            $stm = $pdo->prepare('INSERT INTO permission (search_company, create_company, modify_company, evaluate_company, delete_company, stats_company, search_offer, create_offer, modify_offer, delete_offer, stats_offer, search_pilot, create_pilot, modify_pilot, delete_pilot, search_delegate, create_delegate, modify_delegate, delete_delegate, search_student, create_student, modify_student, delete_student, stats_student, id_user)VALUES(FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, ? );'); //Fill permission for delegates
            $stm->bindParam(1, $id_user);
            $stm->execute();
        }
        if (isset($row[0]) == 1) {
        } else { //if  mail is not valid , returns error code 1
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}


//DELETE USER
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
