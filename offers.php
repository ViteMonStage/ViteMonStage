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
         session_start();
         if ($_SESSION['role'] == 2 && $_SESSION['search_offer'] == 0) {
             header('HTTP/1.1 403 Unauthorized');
             $contents = file_get_contents('./error/403.php', TRUE);
             die($contents);
         }
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
                    <?php
                    include "../db.php"; //Used to get global pdo
                    $stm = $pdo->prepare('SELECT distinct cityname from offers
                            INNER JOIN company on offers.id_company = company.id_company
                            INNER JOIN address on company.id_company = address.id_company
                            INNER JOIN city on address.id_city = city.id_city'); //prepared statement to get the location of the offer
                    $stm->execute();
                    $row = $stm->fetchAll();
                    echo '<option>Any Location</option>';
                    foreach ($row as $value) {
                        echo '<option>' . $value[0] . '</option>';
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
                    <?php
                    include "../db.php"; //Used to get global pdo
                    $stm = $pdo->prepare('SELECT promotion_type FROM promotion_type '); //prepared statement to get the promotion concerned by the offer
                    $stm->execute();
                    $row = $stm->fetchAll();
                    echo '<option>Any Promotion</option>';
                    foreach ($row as $value) {
                        echo '<option>' . $value[0] . '</option>';
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
    var_dump($offer_controller->getOffers());
    ?>
    <h2 class="title big results">
            <?php echo "$count Results";?>
    </h2>
    <div class="s_result">
                    <div class="in_desc">
                        <div>
                            <h3 class="medium off_name"><?php echo  $value[0] ?> </h3>
                            <h4 class="small off_company"><?php echo  $value[1] ?></h4>
                        </div>
                        <p class="mini"><?php echo  $offer_controller->CompanyName ?></p>
                        <h4 class="mini"><?php echo  $value[6] ?> €/ months</h4>
                        <h4 class="mini"> <?php echo  $value[3] ?> (<?php echo  $value[4] ?>) - <?php echo  $value[5] ?> </h4>
                        <h4class="mini"><?php echo  "Starts on the ".$value[12]." and ends on the ".$value[11]." for ".$value[13]." months" ?></h4>
                    </div>
                    <div class="in_logo">
                        <div>
                            <img src="./assets/pictures/logo2.jpg" alt="Logo" class="logoentreprise">
                        </div>
                        <div>
                            <a href="offers_detail.php?id_offer=<?php echo  $value[7] ?>" role="button" class="small btn see">See Offer</a>
                        </div>
                    </div>
                </div>
    


    <!-- FOOTER -->
    <?php
    include "./php/footer.php"
    ?>
</body>

</html>