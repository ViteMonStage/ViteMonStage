<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
if ($_SESSION['role'] == 2 && $_SESSION['create_offer'] == 0 && $_SESSION['delete_offer'] == 0 && $_SESSION['modify_offer'] == 0) {
    header('HTTP/1.1 403 Unauthorized');
    $contents = file_get_contents('../error/403.php', TRUE);
    die($contents);
}
include_once "../php/management/offers.php";

if (isset($_POST['c_offer'])) {
    CreateOffer();
}

if (isset($_POST['d_offer'])) {
    DeleteOffer();
}

if (isset($_POST['m_offer'])) {
    ModifyOffer();
}

class ManagementOffersController{

    function showOfferCreation(){
        if ($_SESSION['role'] != 2 || ($_SESSION['role'] == 2 && $_SESSION['create_offer'] == 1)){
            $session = true;
        }
        return $session;
    }

    function showOfferDeletion(){
        if ($_SESSION['role'] != 2 || ($_SESSION['role'] == 2 && $_SESSION['delete_offer'] == 1)){
            $session = true;
        }
        return $session;
    }

    function showOfferModification(){
        if ($_SESSION['role'] != 2 || ($_SESSION['role'] == 2 && $_SESSION['modify_offer'] == 1)){
            $session = true;
        }
        return $session;
    }



    function showCompanies(){
        try{
            $search = new Company();
            return $search->getCompanies();
        }catch(Exception $e){
            return "Error : " . $e;
        }
    }
    function searchPromotion(){
        try{
            $Search = new Promotion();
            return $Search->getPromotion();
        }catch(Exception $e){
            return "Error : " . $e;
        }
    }

    function security_check(){
        $security_check = array( "skills" => $_POST['c_skills_offer'], "salary" => $_POST['c_salary_offer'], "number_interns" => $_POST['c_interns_offer'], "desc" => $_POST['c_desc_offer'], "name" => $_POST['c_name_offer']);

        //check if the entered info is clean
        foreach( $security_check as $stuff ) {
            if (preg_match('/[\'^}{#~><>¬]/', $stuff)) {
                // one or more of the 'special characters' found in $string
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=2'); //if a character is not valid, returns error code 2
                die();
            }
            if (empty($stuff)) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_error=3'); //if textbox is left empty
                die();
            }
        }
    
    }
    
}

?>