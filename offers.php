<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Offers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="./stylesheets/offers.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <header>
        <?php
        include_once "controller/offers.php";
        include "./php/navbar.php";
        include "./php/db.php"; //Used to get global pdo 
        ?>

    </header>

    <!-- BANNER -->
    <div class="container offerimg">
        <img src="assets/pictures/offres.png" class="img banner" alt="offres">
        <div class="text-block">
            <h4 class="t_off bigtitle smalltitle">Offers</h4>
            <p class="t_off2 bigtitle smalltitle">Check out the most recent offers right now!</p>
        </div>
    </div>

    <!-- SEARCH BARS -->
    <form action="/php/searchoffers.php" method="POST">
        <div class="row g-0 justify-content-center">
            <div class="col-lg-2 col-sm-12 test ">
                <label for="nametbx" class="tbxindicator small">Offer name</label>
                <input type="text" class="tbx small" id="nametbx" name="offer_name">
            </div>
            <div class="col-lg-2 col-sm-12 test">
                <label for="locatbx" class="tbxindicator small">Location</label>
                <select class="form-control tbx small" id="locatbx" name="offer_location">
                    <option>Any Location</option>
                    <?php 
                        $citysearchcontroller = new SearchCityController();
                        $Search = $citysearchcontroller->searchCity();
                        for($i = 0; $i < sizeof($Search); $i ++){
                        echo '<option>' . $Search[$i]->City . '</option>';
                        }
                    ?> 
                </select>
            </div>
            <div class="col-lg-2 col-sm-12 test ">
                <label for="placetbx" class="tbxindicator small">Minimum places</label>
                <input type="number" min="1" class="tbx small" id="placetbx" name="min_place_offer">
            </div>
            <div class="col-lg-2 col-sm-12 test ">
                <label for="durationtbx" class="tbxindicator small">Duration (months)</label>
                <input type="number" min="1" class="tbx small" id="durationtbx" name="duration">
            </div>
            <div class="col-lg-2 col-sm-12 test">
                <label for="promostbx" class="tbxindicator small">Promotions</label>
                <select class="form-control tbx small" id="promostbx" name="promotion">
                    <option>Any Promotion</option>
                    <?php                   
                    $promotionsearchcontroller = new SearchPromotionController();
                    $Search = $promotionsearchcontroller->searchPromotion();
                    for($i = 0; $i < sizeof($Search); $i ++){
                        echo '<option>' . $Search[$i]->Promotion . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <input type="submit" class="small btn search" id="submit" value="Search">
    </form>

    <!-- RESULTS -->
    <?php 
    $offer_controller = new OffersController();
    $offer= $offer_controller->getOffers();
    
    ?>
    <h2 class="title big results">
            <?php echo $offer[0]->OffersCount." Results";?>
    </h2>
    <?php if ($offer[0]->OffersCount == 0){

    } 
    else {
        for($i = 0; $i < sizeof($offer); $i ++){
             ?>
    <div class="s_result">
                    <div class="in_desc">
                        <div>
                            <h3 class="medium off_name"><?php echo  $offer[$i]->OfferName ?> </h3>
                            <h4 class="small off_company"><?php echo  $offer[$i]->CompanyName ?></h4>
                        </div>
                        <p class="mini"><?php echo  $offer[$i]->Description ?></p>
                        <h4 class="mini"><?php echo  $offer[$i]->Salary ?> €/ months</h4>
                        <h4 class="mini"> <?php echo  $offer[$i]->City ?> (<?php echo  $offer[$i]->ZipCode ?>) - <?php echo  $offer[$i]->PromotionType ?> </h4>
                        <h4class="mini"><?php echo  "Starts on the ".$offer[$i]->StartingDate." and ends on the ".$offer[$i]->EndDate." for ".$offer[$i]->Duration." months" ?></h4>
                    </div>
                    <div class="in_logo">
                        <div>
                            <img src="./assets/pictures/logo2.jpg" alt="Logo" class="logoentreprise">
                        </div>
                        <div>
                            <a href="offers_detail.php?id_offer=<?php echo  $offer[$i]->IdOffer ?>" role="button" class="small btn see">See Offer</a>
                        </div>
                    </div>
                </div> 

    <?php
        }
    }
    // FOOTER
    include "./php/footer.php"
    ?>
</body>

</html>