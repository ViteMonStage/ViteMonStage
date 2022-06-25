<?php
class Search{}
class Offer{
    private $OfferName;
    private $CompanyName;
    private $Description;
    private $City;
    private $ZipCode;
    private $OfferDate;
    private $Salary;
    private $NumberOfInterns;
    private $SkillsRequired;
    private $PromotionType;
    private $StartingDate;
    private $EndDate;
    private $Duration;
    private $IdOffer;
    private $OffersCount;
    
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
public function getOffers()
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $query = 'SELECT offer_name,
        company.company_name,
        offers.description,
        cityname,
        zipcode,
        offer_date,
        offers.salary,
        offers.id_offer,
        offers.number_interns,
        offers.skills,
        promotion_type,
        offers.intership_end,
        offers.intership_start,
        datediff(offers.intership_end,offers.intership_start) DIV 28 as months from offers
        INNER JOIN company on offers.id_company = company.id_company
        INNER JOIN address on company.id_company = address.id_company
        INNER JOIN city on address.id_city = city.id_city
        LEFT JOIN concern on concern.id_offer = offers.id_offer
        LEFT JOIN promotion_type on promotion_type.id_promotion_type = concern.id_promotion_type
        WHERE 1=1
        ';

        if(!empty($_GET["offer_name"])){
            $query=$query." AND offer_name LIKE '%".$_GET["offer_name"]."%'";
        }
        if(!empty($_GET["offer_location"])){                                      //get the "location" value
            if($_GET["offer_location"] == "Any Location"){                        //if the value of "location" is "Any location", the variable $quary won't change
            }else $query=$query." AND cityname='".$_GET["offer_location"]."'";    //if the value of "location" is one of a city, the variable $quary will be updated whith the name of the city
        }
        if(!empty($_GET["min_place_offer"])){
            $query=$query." AND number_interns>'".$_GET["min_place_offer"]."'";
        }
        if(!empty($_GET["duration"])){
            $query=$query." AND datediff(offers.intership_end,offers.intership_start) DIV 28 >= '".$_GET['duration']."'";
        }
        if(!empty($_GET["promotion"])){                                      //get the "location" value
            if($_GET["promotion"] == "Any Promotion"){                        //if the value of "location" is "Any location", the variable $quary won't change
            }else $query=$query." AND promotion_type='".$_GET["promotion"]."'";    //if the value of "location" is one of a city, the variable $quary will be updated whith the name of the city
        }

        $sql = $pdo->prepare($query);  
        $sql->execute();
        $row = $sql->fetchAll();
        $rowcount= $sql->rowCount();


        $array = [];

        if (isset($row[0]) == 1)
        {
                foreach ($row as $value)
                {
                    $offer = new Offer();
                    $offer->__set("OfferName", $value[0]);
                    $offer->__set("CompanyName", $value[1]);
                    $offer->__set("Description", $value[2]);
                    $offer->__set("City", $value[3]);
                    $offer->__set("ZipCode", $value[4]);
                    $offer->__set("OfferDate", $value[5]);
                    $offer->__set("Salary", $value[6]);
                    $offer->__set("NumberOfInterns", $value[8]);
                    $offer->__set("SkillsRequired", $value[9]);
                    $offer->__set("PromotionType", $value[10]);
                    $offer->__set("StartingDate", $value[12]);
                    $offer->__set("EndDate", $value[11]);
                    $offer->__set("Duration", $value[13]);
                    $offer->__set("IdOffer", $value[7]);
                    $offer->__set("OffersCount",$rowcount);
                    array_push($array,$offer) ;
                }
                return $array;
                var_dump($array);
        }
        else{
            $nocount = new Offer();
            $nocount->__set("OffersCount",$rowcount);
            array_push($array,$nocount) ;
            return $array;
        }
        
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}
}
