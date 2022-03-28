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
        include_once "./php/db.php"; //Used to get global pdo
        include_once "./php/offers_sql.php";
        include_once "./php/navbar.php";
        ?>
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
        <div class="col-lg-2 col-sm-12">
            <label for="nametbx" class="tbxindicator small">Location</label>
            <input type="text" class="tbx small" id="nametbx">
        </div>
        <div class="col-lg-2 col-sm-12">
            <label for="locationtbx" class="tbxindicator small">Publication date</label>
            <input type="text" class="tbx small" id="locationtbx">
        </div>
        <div class="col-lg-2 col-sm-12">
            <label for="sectortbx" class="tbxindicator small">Sector</label>
            <input type="text" class="tbx small" id="sectortbx">
        </div>
        <div class="col-lg-2 col-sm-12">
            <label for="sectortbx" class="tbxindicator small">Number of places</label>
            <input type="text" class="tbx small" id="placetbx">
        </div>
        <div class="col-lg-2 col-sm-12">
            <label for="sectortbx" class="tbxindicator small">Duration</label>
            <input type="text" class="tbx small" id="durationtbx">
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

    <!-- RESULT 1 -->
    <div class="s_result">
        <div class="in_desc">
            <div>
                <h3 class="medium off_name"><?php
                                            try {
                                                $sql = $pdo->prepare('SELECT offer_name,company.company_name,offers.description,cityname,zipcode,offer_date,sector_activity from offers
    INNER JOIN company on offers.id_company = company.id_company
    INNER JOIN address on company.id_company = address.id_company
    INNER JOIN city on address.id_city = city.id_city');
                                                $sql->execute();
                                                $row = $sql->fetchAll();
                                                print_r($row[0][0]);
                                            } catch (Exception $e) {
                                                echo 'Erreur ahi $e';
                                            }
                                            ?></h3>
                <h4 class="small off_company"><?php print_r($row[0][1]); ?> </h4>
            </div>
            <p class="mini"><?php print_r($row[0][2]); ?></p>
            <h4 class="mini"><?php print_r($row[0][3]); ?>(<?php print_r($row[0][4]); ?>) - <?php print_r($row[0][5]); ?> - <?php print_r($row[0][6]); ?></h4>
        </div>
        <div class="in_logo">
            <div>
                <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
            </div>
            <div>
                <a href="offers_detail.php" role="button" class="small btn see">See Offer</a>
            </div>
        </div>
    </div>

    <!-- RESULT 2 -->
    <div class="s_result">
        <div class="in_desc">
            <div>
                <h3 class="medium off_name"><?php print_r($row[1][0]); ?></h3>
                <h4 class="small off_company"><?php print_r($row[1][1]); ?></h4>
            </div>
            <p class="mini"><?php print_r($row[1][2]); ?></p>
            <h4 class="mini"><?php print_r($row[1][3]); ?> (<?php print_r($row[1][4]); ?>) - <?php print_r($row[1][5]); ?> - <?php print_r($row[1][6]); ?></h4>
        </div>
        <div class="in_logo">
            <div>
                <img src="./assets/pictures/logo2.jpg" alt="Logo" class="logoentreprise">
            </div>
            <div>
                <a href="offers_detail.php" role="button" class="small btn see">See Offer</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php
    include "./php/footer.php"
    ?>
</body>

</html>