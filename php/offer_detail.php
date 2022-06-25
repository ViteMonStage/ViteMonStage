<?php
class OfferDetail{
    private $OfferName;
    private $CompanyName;
    private $City;
    private $ZipCode;
    private $PromotionType;
    private $SkillsRequiered;
    private $OfferDate;
    private $NumberOfInterns;
    private $StartingDate;
    private $EndDate;
    private $Description;
    private $Salary;

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

public function getOfferdetail($id_offer)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT offer_name,company.company_name,cityname,zipcode,offer_date,number_interns, 
        intership_start,intership_end,offers.description,offers.skills,promotion_type,offers.salary from offers
        INNER JOIN company on offers.id_company = company.id_company
        INNER JOIN address on company.id_company = address.id_company
        INNER JOIN city on address.id_city = city.id_city
        LEFT JOIN concern on concern.id_offer = offers.id_offer
        LEFT JOIN promotion_type on promotion_type.id_promotion_type = concern.id_promotion_type
        WHERE offers.id_offer = ?');
        $sql->bindParam(1, $id_offer); //Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->execute(); //Execution of the request
        $row = $sql->fetchAll(); //Retrieves the rows of the query
        if (isset($row[0]) == 1) {
            foreach ($row as $value) {
                $offer_details = new OfferDetail();
                $offer_details->__set("OfferName", $value[0]);
                $offer_details->__set("CompanyName", $value[1]);
                $offer_details->__set("City", $value[2]);
                $offer_details->__set("ZipCode", $value[3]);
                $offer_details->__set("OfferDate", $value[4]);
                $offer_details->__set("NumberOfInterns", $value[5]);
                $offer_details->__set("StartingDate", $value[6]);
                $offer_details->__set("EndDate", $value[7]);
                $offer_details->__set("Description", $value[8]);
                $offer_details->__set("SkillsRequiered", $value[9]);
                $offer_details->__set("PromotionType", $value[10]);
                $offer_details->__set("Salary", $value[11]);
            }
        }
        return $offer_details;
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function hasAlreadySentCandidature($id_offer)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT * FROM candidature WHERE id_offer = ? AND id_user = ?');
        $sql->bindParam(1, $id_offer); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->bindParam(2, $_SESSION['id_user']);
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (isset($row[0]) == 1) {
            return true;
        }
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function hasAlreadyCanceled($id_offer)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT * FROM candidature WHERE id_offer = ? AND id_user = ? AND id_statut=2');
        $sql->bindParam(1, $id_offer); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->bindParam(2, $_SESSION['id_user']);
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (isset($row[0]) == 1) {
            return true;
        }
        return false;
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function hasAlreadyAccepted($id_offer)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT * FROM candidature WHERE id_offer = ? AND id_user = ? AND id_statut=1');
        $sql->bindParam(1, $id_offer); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->bindParam(2, $_SESSION['id_user']);
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (isset($row[0]) == 1) {
            return true;
        }
        return false;
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function getCompanyFromOffer($id_offer)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT id_company FROM offers WHERE id_offer = ?');
        $sql->bindParam(1, $id_offer); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (isset($row[0]) == 1) {
            return $row[0][0];
        }
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function alertHandler()
{

}

function getIdCandidatureFromUser($id_offer)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT id_candidature FROM candidature WHERE id_offer = ? AND id_user=?');
        $sql->bindParam(1, $id_offer); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->bindParam(2, $_SESSION["id_user"]);
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (isset($row[0]) == 1) {
            return $row[0][0];
        }
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}


function getCandidatureStatus($id_offer)
    {
        include "candidature.php";
        if ($this->hasAlreadySentCandidature($id_offer) && !$this->hasAlreadyCanceled($id_offer) && !$this->hasAlreadyAccepted($id_offer)){
            return getStep($this->getIdCandidatureFromUser($id_offer));
        }
        if($this->hasAlreadyCanceled($id_offer)){
            return "Canceled";
        }
        if($this->hasAlreadyAccepted($id_offer)){
            return "Accepted";
        }
    }
}