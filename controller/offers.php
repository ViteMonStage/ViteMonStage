<?php
session_start();

 if ($_SESSION['role'] == 2 && $_SESSION['search_offer'] == 0) {
    header('HTTP/1.1 403 Unauthorized');
    $contents = file_get_contents('./error/403.php', TRUE);
    die($contents);
    
}


include "./php/offer.php"; 



class OfferController{

    function searchcity(){
        try{
            $Search = new City();
            return $Search->getCity();
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
    
    function getOffers(){
        try{
            $offer = new Offer();
            return $offer->getOffers();
        }catch(Exception $e){
            return "Error : " . $e;
        }
    }
}

?>