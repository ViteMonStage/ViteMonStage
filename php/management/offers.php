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

    if (preg_match('/[\'^}{#~><>¬]/', $skills)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $salary)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $number_interns)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $desc)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $name)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }

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


//DELETE OFFER 
if (isset($_POST['d_offer'])) {
    $name = $_POST['d_name'];
    $company = $_POST['d_company'];
    if (empty($name) || empty($company)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?d_error=3'); //if textbox is left empty
        die();
    }
    try {
        $stm = $pdo->prepare('SELECT id_offer FROM offers INNER JOIN company ON offers.id_company = company.id_company WHERE offer_name=? AND company_name=?'); //prepared statement to verify offer existence
        $stm->bindParam(1, $name);
        $stm->bindParam(2, $company);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            $id_offer = $row[0][0];
            $stm = $pdo->prepare('DELETE FROM offers WHERE id_offer=?'); //prepared statement to delete user
            $stm->bindParam(1, $id_offer);
            if ($stm->execute() == FALSE) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?d_error=1'); //if a value is not valid / an error occured , returns error code 1
                die();
            }
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?d_good=1');
        } else { //if  mail is not valid , returns error code 1
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?d_error=4');
            die();
        }
    } catch (\PDOException $e) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?d_error=1'); //if a value is not valid , returns error code 1
        die();
    }
}
