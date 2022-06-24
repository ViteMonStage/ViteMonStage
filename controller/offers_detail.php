<?php

include "./php/offer_detail.php"; //Used to get global pdo
include "./php/db.php"; //Used to get global pdo

class OfferDetailsController{


function getOfferdetail(){
    try{
        $offer_details = new OfferDetail();
        return $offer_details->getOfferdetail(8);
    }catch(Exception $e){
        return "Error : " . $e;
    }
}

function hasAlreadySentCandidature(){
    try{
    $offer_details = new OfferDetail();
        return $offer_details->hasAlreadySentCandidature;
    }catch(Exception $e){
        return "Error : " . $e;
    }
}

}
?>