<?php
include "../db.php"; //Used to get global pdo
session_start();

//CREATE COMPANY
if (isset($_POST['c_company'])) {
    $name = $_POST['c_name'];
    $sector = $_POST['c_sector'];
    $email = $_POST['c_mail'];
    $description = $_POST['c_desc'];

    $street_name = $_POST['c_street_name'];
    $street_number = $_POST['c_street_number'];
    $building_name = $_POST['c_building_name'];
    $floor = $_POST['c_floor'];

    $id_city = $_POST['c_city'];

    //CHECK IF TEXTBOXES ARE FILLED
    if (empty($name)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($sector)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($email)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($description)) {
        $description=NULL;
    }
    if (empty($street_name)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($street_number)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=3'); //if textbox is left empty
        die();
    }
    if (empty($building_name)) {
        $building_name=NULL;
    }
    if (empty($floor)) {
        $floor=NULL;
    }
    //CHARACTER VERIFICATION
    if (preg_match('/[\'^}{#~><>¬]/', $name)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $sector)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $email)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $description)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $street_name)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $street_number)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $building_name)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $floor)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    try {
        $stm = $pdo->prepare('INSERT INTO company (company_name, sector_activity, nbr_cesi_student_accepted, visible, email, description) VALUES (?,?,0,1,?,?)'); //prepared statement to insert values
        $stm->bindParam(1, $name);
        $stm->bindParam(2, $sector);
        $stm->bindParam(3, $email);
        $stm->bindParam(4, $description);
        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }
        $stm = $pdo->prepare('SELECT MAX(id_company) FROM company'); //We get the last company id
        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }
        $row = $stm->fetchAll();
        $id_company = $row[0][0];

        $stm = $pdo->prepare('INSERT INTO address (street_name, street_number, building_name, floor, id_city, id_company) VALUES (?,?,?,?,?,?)'); //prepared statement to insert values
        $stm->bindParam(1, $street_name);
        $stm->bindParam(2, $street_number);
        $stm->bindParam(3, $building_name);
        $stm->bindParam(4, $floor);
        $stm->bindParam(5, $id_city);
        $stm->bindParam(6, $id_company);
        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_good=1'); //if everything is good , returns good code 1
    } catch (\PDOException $e) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?c_error=1'); //if exception , returns error code 1
        die();
    }
}


//DELETE COMPANY
if (isset($_POST['d_company'])) {
    $name = $_POST['d_name'];
    if(empty($name)){
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/company.php?d_error=3'); //if textbox is left empty
        die();
    }
    try {
        $stm = $pdo->prepare('SELECT id_company FROM company WHERE company_name=?'); //prepared statement to verify company existence
        $stm->bindParam(1, $name);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            $stm = $pdo->prepare('DELETE FROM company WHERE company_name=?'); //prepared statement to delete company
            $stm->bindParam(1, $name);
            $stm->execute();
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?d_good=1');
        } else { //if  mail is not valid , returns error code 1
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?d_error=2');
        }
    } catch (\PDOException $e) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/companies.php?d_error=1'); //if a value is not valid , returns error code 1
    }
}
