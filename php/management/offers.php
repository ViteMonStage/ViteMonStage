<?php

//CREATE OFFER
//if (isset($_POST['c_offer'])) {
function CreateOffer()
{
    include dirname(__FILE__) . "../../db.php"; //Used to get global pdo

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
    
    $security_check = new ManagementOffersController();
    $security_check->security_check();
    
    try {
        include dirname(__FILE__) . "../../db.php"; //Used to get global pdo
        $stm = $pdo->prepare('INSERT INTO offers (skills, intership_start, intership_end, salary, offer_date, number_interns, id_company, description, offer_name) VALUES (?,?,?,?,?,?,?,?,?)'); //prepared statement to insert values
        //Faire boucle avec tableau et bindparam
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
            echo $e->getMessage();
            echo "   ";
            echo (int)$e->getCode();
            die();
        }

        $stm = $pdo->prepare('SELECT MAX(id_offer) FROM offers'); //We get the last offer id
        $stm->execute();
        $row = $stm->fetchAll();
        $id_offer = $row[0][0];
        $stm = $pdo->prepare('INSERT INTO concern (id_offer, id_promotion_type) VALUES (?,?)'); //prepared statement to insert values
        $stm->bindParam(1, $id_offer);
        $stm->bindParam(2, $id_promotion_type);
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?c_good=1'); //if everything is good , returns good code 1
    } catch (\PDOException $e) {
        echo $e->getMessage();
            echo "   ";
            echo (int)$e->getCode();
        die();
    }
}


//DELETE OFFER 
//if (isset($_POST['d_offer'])) {
function DeleteOffer()
{
    include dirname(__FILE__) . "../../db.php"; //Used to get global pdo
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

//MODIFY OFFER 
//if (isset($_POST['m_offer'])) {
function ModifyOffer()
{
    include dirname(__FILE__) . "../../db.php"; //Used to get global pdo
    $skills = $_POST['m_skills_offer'];
    $id_offer = $_POST['m_id_offer'];
    $internship_start = $_POST['m_start_date_offer'];
    $internship_end = $_POST['m_end_date_offer'];
    $salary = $_POST['m_salary_offer'];
    $number_interns = $_POST['m_interns_offer'];
    $desc = $_POST['m_desc_offer'];
    $name = $_POST['m_name_offer'];
    $promotion_type = $_POST['m_promotion_type'];
    $offer_date = date('Y-m-d', time());

   

    if (preg_match('/[\'^}{#~><>¬]/', $skills)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $salary)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $number_interns)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $desc)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=2'); //if a character is not valid, returns error code 2
        die();
    }
    if (preg_match('/[\'^}{#~><>¬]/', $name)) {
        // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=2'); //if a character is not valid, returns error code 2
        die();
    }

    //CHECK IF TEXTBOXES ARE FILLED
    if (empty($skills)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=3'); //if textbox is left empty
        die();
    }
    if (empty($salary)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=3'); //if textbox is left empty
        die();
    }
    if (empty($number_interns)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=3'); //if textbox is left empty
        die();
    }
    if (empty($desc)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=3'); //if textbox is left empty
        die();
    }
    if (empty($name)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=3'); //if textbox is left empty
        die();
    }

    try {
        $stm = $pdo->prepare('UPDATE offers
        SET skills = ?, 
        intership_start = ?,
        intership_end =?,
        salary=?, 
        number_interns=?,
        description=?,
        offer_name=?
        WHERE id_offer=?'); //prepared statement to insert values
        $stm->bindParam(1, $skills);
        $stm->bindParam(2, $internship_start);
        $stm->bindParam(3, $internship_end);
        $stm->bindParam(4, $salary);
        $stm->bindParam(5, $number_interns);
        $stm->bindParam(6, $desc);
        $stm->bindParam(7, $name);
        $stm->bindParam(8, $id_offer);
                        
        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }
        $stm = $pdo->prepare('SELECT id_promotion_type from promotion_type
        WHERE promotion_type = ?');
        $stm->bindParam(1, $promotion_type);
        $stm->execute; 
        $row = $stm->fetchAll();
        $id_promotion_type= $row[0][0];
        $stm = $pdo->prepare('UPDATE concern 
        set id_promotion_type = ? WHERE id_offer =?'); 
        $stm->bindParam(1, $id_offer);
        $stm->bindParam(2, $id_promotion_type);

        if ($stm->execute() == FALSE) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=1'); //if a value is not valid / an error occured , returns error code 1
            die();
        }
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_good=1'); //if everything is good , returns good code 1

    } catch (\PDOException $e) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/management/offers.php?m_error=1'); //if exception , returns error code 1
        die();
    }
}

class Company{
    private $company;
    private $idCompany;

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
      }
    
      public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
    }

    public function getCompanies(){
        try {
                include dirname(__FILE__) . "../../db.php"; //Used to get global pdo
                $stm = $pdo->prepare('SELECT id_company, company_name FROM company'); //query to get company ids and their name
                $stm->execute();
                $row = $stm->fetchAll();
                $array = [];
                foreach ($row as $value)
                {
                    $company = new Company();
                    $company->__set("idCompany", $value[0]);
                    $company->__set("company", $value[1]);
                    array_push($array,$company) ;
                }
                return $array;
        }
        catch (\PDOException $e) {
            echo $e->getMessage();
            echo "   ";
            echo (int)$e->getCode();
        }
    }
}

class Promotion{
    private $Promotion;
    private $idPromotion;
    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
      }
    
      public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
    }

    public function getPromotion(){
        try {
        include dirname(__FILE__) . "../../db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT id_promotion_type,promotion_type FROM promotion_type '); //prepared statement to get the promotion concerned by the offer
                    $stm->execute();
                    $row = $stm->fetchAll();
                    $array = [];
                foreach ($row as $value)
                {
                    $promotion = new Promotion();
                    $promotion->__set("idPromotion", $value[0]);
                    $promotion->__set("Promotion", $value[1]);
                    array_push($array,$promotion) ;
                }
                return $array;
        }
        catch (\PDOException $e) {
            echo $e->getMessage();
            echo "   ";
            echo (int)$e->getCode();
        }
    }
}