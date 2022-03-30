<?php
include "../db.php"; //Used to get global pdo
session_start();

//CREATE OFFER
if (isset($_POST['c_offer'])) {
    $skills = $_POST['c_skills_offer'];
    $internship_start = $_POST['c_start_date_offer'];
    $internship_end = $_POST['c_end_date_offer'];
    $salary = $_POST['c_salary_offer'];
    $number_interns = $_POST['c_interns_offer'];
    $id_company = $_POST['c_company_offer'];
    $desc = $_POST['c_desc_offer'];
    $name = $_POST['c_name_offer'];
    $id_promotion_type = $_POST['c_promo_offer'];
    $offer_date = date('Y-m-d', time());


    //CHECK IF TEXTBOXES ARE FILLED
    if (empty($skills)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($salary)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($number_interns)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($desc)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($name)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=3'); //if textbox is left empty
        die();
    }


    try {
        $stm = $pdo->prepare('INSERT INTO offers (skills, intership_start, intership_end, salary, offer_date, number_interns, id_company, description, offer_name) VALUES (?,?,?,?,?,?,?,?,?)'); //prepared statement to insert values
        $stm->bindParam(1, $skills);
        $stm->bindParam(2, $internship_start);
        $stm->bindParam(3, $internship_end);
        $stm->bindParam(4, $salary);
        $stm->bindParam(5, $offer_date);
        $stm->bindParam(6, $number_interns);
        $stm->bindParam(7, $id_company);
        $stm->bindParam(8, $desc);
        $stm->bindParam(9, $name);
        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }

        $stm = $pdo->prepare('SELECT MAX(id_offer) FROM offers'); //We get the last offer id
        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }
        $row = $stm->fetchAll();
        $id_offer = $row[0][0];

        $stm = $pdo->prepare('INSERT INTO concern (id_offer, id_promotion_type) VALUES (?,?)'); //prepared statement to insert values
        $stm->bindParam(1, $id_offer);
        $stm->bindParam(2, $id_promotion_type);
        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_good=1'); //if everything is good , returns good code 1
    } catch (\PDOException $e) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=1'); //if exception , returns error code 1
        die();
    }
}


//DELETE OFFER NOT DONE
if (isset($_POST['d_user'])) {
    $email = $_POST['d_email'];
    if (empty($email)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/users.php?d_error=3'); //if textbox is left empty
        die();
    }
    try {
        $stm = $pdo->prepare('SELECT id_user FROM user WHERE email=?'); //prepared statement to verify email
        $stm->bindParam(1, $email);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            $stm = $pdo->prepare('DELETE FROM user WHERE email=?'); //prepared statement to delete user
            $stm->bindParam(1, $email);
            $stm->execute();
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
