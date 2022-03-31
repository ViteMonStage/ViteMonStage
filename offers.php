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
        include "./php/navbar.php";
        ?>
        <?php include "./php/db.php"; //Used to get global pdo ?>
   
    </header>

    <!-- BANNER -->
    <div class="container offerimg">
        <img src="assets/pictures/offres.png" class="img banner" alt="offres">
        <div class="text-block">
            <h4 class="t_off bigtitle smalltitle">Offers</h4>
            <p class="t_off2 bigtitle smalltitle">Check out the popular offers right now.</p>
        </div> 
    </div>

    <!-- SEARCH BARS -->
    <div class="row g-0 justify-content-center">
        <div class="col-lg-2 col-sm-12 test">
            <label for="nametbx" class="tbxindicator small">Location</label>
            <select class="form-control tbx small"  id="nametbx">
                            <?php
                            include "../db.php"; //Used to get global pdo
                            $stm = $pdo->prepare('SELECT distinct cityname from offers
                            INNER JOIN company on offers.id_company = company.id_company
                            INNER JOIN address on company.id_company = address.id_company
                            INNER JOIN city on address.id_city = city.id_city'); //prepared statement to get the location of the offer
                            $stm->execute();
                            $row = $stm->fetchAll();
                            foreach($row as $value)
                            {
                                echo'<option>'.$value[0].'</option>';
                            }
                            ?>
                        </select>
        </div>
        <div class="col-lg-2 col-sm-12 test ">
            <label for="locationtbx" class="tbxindicator small">Publication date</label>
            <input type="text" class="tbx small" id="locationtbx">
        </div>
        <div class="col-lg-2 col-sm-12 test ">
            <label for="placetbx" class="tbxindicator small">Number of places</label>
            <input type="number" class="tbx small" id="placetbx" placeholder="1">
        </div>
        <div class="col-lg-2 col-sm-12 test ">
            <label for="durationtbx" class="tbxindicator small">Duration (months)</label>
            <input type="number" class="tbx small" id="durationtbx" placeholder="4">
        </div>
        <div class="col-lg-2 col-sm-12 test">
            <label for="promostbx" class="tbxindicator small">Promotions</label>
            <select class="form-control tbx small"  id="promostbx">
                            <?php
                            include "../db.php"; //Used to get global pdo
                            $stm = $pdo->prepare('SELECT promotion_type FROM promotion_type '); //prepared statement to get the promotion concerned by the offer
                            $stm->execute();
                            $row = $stm->fetchAll();
                            foreach($row as $value)
                            {
                                echo'<option>'.$value[0].'</option>';
                            }
                            ?>
                        </select>
        </div>
    </div>
    <input type="button" class="small btn search" id="searchbtn" value="Search">


    <h2 class="title big resu">
        <?php
        $sql = ('SELECT count(id_offer) FROM 8aah0fCXko.offers;'); //prepared statement to verify email and password
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        echo "$count Results";
        ?>
    </h2>

    <!-- RESULTS -->
    <?php include_once dirname(__FILE__) . "/php/offer.php";displayOffers(); ?>


 

    <!-- FOOTER -->
    <?php
    include "./php/footer.php"
    ?>
</body>

</html>