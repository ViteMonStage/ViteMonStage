<?php

include "./php/offer.php"; 
include "./php/db.php"; //Used to get global pdo

class OffersController{


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