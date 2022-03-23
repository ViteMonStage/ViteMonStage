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
        include "./phpscripts/navbar.php"
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


    <h2 class="title big resu">2 Results</h2>
    <!-- RESULT 1 -->
    <div class="s_result">
        <div class="in_desc">
            <div>
                <h3 class="medium off_name">First offer</h3>
                <h4 class="small off_company">DC Incorporated</h4>
            </div>
            <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
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
                <h3 class="medium off_name">Second offer</h3>
                <h4 class="small off_company">RO and Sons</h4>
            </div>
            <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            <h4 class="mini">Rouen (76100) - Publication 10/12/2022 - IT</h4>
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
    include "./phpscripts/footer.php"
    ?>
</body>

</html>