<?php
include "../db.php"; //Used to get global pdo
session_start();


//CREATE USER
if (isset($_POST['c_user'])) {
    $email = $_POST['c_email'];
    $firstname = $_POST['c_firstname'];
    $lastname = $_POST['c_lastname'];
    $birthday = $_POST['c_birthday'];
    $gender = $_POST['c_gender'];
    $id_promotion = $_POST['c_promo'];
    //CHECK PASSWORD
    if ($_POST['c_password'] == $_POST['c_password_r']) //Check if the user typed his password correctly twice
    {
        $password = $_POST['c_password'];
    } else {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_pass=1');
        die();
    }
    //CHECK IF TEXTBOXES ARE FILLED
    if (empty($firstname)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($lastname)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($email)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($password)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=3'); //if textbox is left empty
        die();
    }
    //prepared statement to get role id
    $stm = $pdo->prepare('SELECT id_role FROM role WHERE role = ?');
    $stm->bindParam(1, $_POST['c_role']);
    if ($stm->execute() == FALSE) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
        die();
    }
    $row = $stm->fetchAll();
    $id_role = $row[0][0];
    //CHARACTER VERIFICATION
    if (preg_match('/[\'^}{#~><>¬]/', $firstname)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $lastname)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $email)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $password)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    //prepared statement to get campus id    
    $stm = $pdo->prepare('SELECT id_campus FROM campus WHERE campus_name = ?');
    $stm->bindParam(1, $_POST['c_campus']);
    if ($stm->execute() == FALSE) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
        die();
    }
    $row = $stm->fetchAll();
    $id_campus = $row[0][0];
    try {
        $stm = $pdo->prepare('INSERT INTO user (email, password, firstname, lastname, birthday, gender, id_role, id_promotion, id_permission, id_campus) VALUES (?,?,?,?,?,?,?,?,NULL,?)'); //prepared statement to insert values
        $stm->bindParam(1, $email);
        $stm->bindParam(2, $password);
        $stm->bindParam(3, $firstname);
        $stm->bindParam(4, $lastname);
        $stm->bindParam(5, $birthday);
        $stm->bindParam(6, $gender);
        $stm->bindParam(7, $id_role);
        $stm->bindParam(8, $id_promotion);
        $stm->bindParam(9, $id_campus);
        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }
        if ($id_role == 2) {
            $stm = $pdo->prepare('SELECT id_user from user WHERE email = ?'); // We get the id from the user we just created
            $stm->bindParam(1, $email);
            if ($stm->execute() == FALSE) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
                die();
            }
            $row = $stm->fetchAll();
            $id_user = $row[0][0];
            $stm = $pdo->prepare('INSERT INTO permission (search_company, create_company, modify_company, evaluate_company, delete_company, stats_company, search_offer, create_offer, modify_offer, delete_offer, stats_offer, search_pilot, create_pilot, modify_pilot, delete_pilot, search_delegate, create_delegate, modify_delegate, delete_delegate, search_student, create_student, modify_student, delete_student, stats_student, id_user)VALUES(FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, ? );'); //Fill permission for delegates
            $stm->bindParam(1, $id_user);
            if ($stm->execute() == FALSE) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
                die();
            }
            $stm = $pdo->prepare('SELECT MAX(id_permission) FROM permission'); //We get the last permission id
            $stm->bindParam(1, $id_user); {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
                die();
            }
            $row = $stm->fetchAll();
            $id_permission = $row[0][0];
            $stm = $pdo->prepare('UPDATE user SET id_permission = ? WHERE id_user= ?'); //Update user table
            $stm->bindParam(1, $id_permission);
            $stm->bindParam(2, $id_user);
            if ($stm->execute() == FALSE) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
                die();
            }
        }
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_good=1'); //if everything is good , returns good code 1
    } catch (\PDOException $e) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?c_error=1'); //if exception , returns error code 1
        die();
    }
}


//DELETE USER
if (isset($_POST['d_user'])) {
    $email = $_POST['d_email'];
    if (empty($email)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?d_error=3'); //if textbox is left empty
        die();
    }
    try {
        $stm = $pdo->prepare('SELECT id_user, id_role FROM user WHERE email=?'); //prepared statement to verify email
        $stm->bindParam(1, $email);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            if($_SESSION['role'] == 3 || ($_SESSION['role'] == 2 && $_SESSION['delete_pilot'] == 1 ))
            {
                if($row[0][1] == 3 || $row[0][1] == 4)
                {
                    header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?d_error=5'); //if user does not have right to delete the user, return error 5
                    die();
                }
                
            }
            elseif ($_SESSION['role'] == 2 && $_SESSION['create_pilot'] == 0 && $_SESSION['create_delegate'] == 0) {
                if($row[0][1] == 3 || $row[0][1] == 4 || $row[0][1] == 2)
                {
                    header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?d_error=5'); //if user does not have right to delete the user, return error 5
                    die();
                }
            }
            $stm = $pdo->prepare('DELETE FROM user WHERE email=?'); //prepared statement to delete user
            $stm->bindParam(1, $email);
            if ($stm->execute() == FALSE) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?d_error=1'); //if a value is not valid / an error occured , returns error code 1
                die();
            }
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?d_good=1');
        } else { //if  mail is not valid , returns error code 1
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?d_error=4');
            die();
        }
    } catch (\PDOException $e) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?d_error=1'); //if a value is not valid , returns error code 4
        die();
    }
}
