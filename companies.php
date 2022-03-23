<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Companies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/companies.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <!-- Nav bar-->
    <header>
        <?php
        include "./phpscripts/navbar.php"
        ?>
    </header>
    <!-- Head band-->
    <div class="container">
        <img src="./assets/pictures/bandeau.jpg" class="img-fluid image" alt="Responsive image">
        <div class="centered">
            <h1 class="big title">Companies</h1>
        </div>
    </div>
    <!-- Filtre -->
    <div class="row g-0 justify-content-center filt smalltitle bigtitle">
        <div class="col-lg-3 col-sm-12 colo">
            <label for="nametbx" class="tbxindicator small">Name</label>

            <input type="text" class="tbx small" id="nametbx">
        </div>

        <div class="col-lg-3 col-sm-12 colo">
            <label for="locationtbx" class="tbxindicator small">Location</label>
            <input type="text" class="tbx small" id="locationtbx">
        </div>
        <div class="col-lg-3 col-sm-12 colo">
            <label for="sectortbx" class="tbxindicator small">Sector</label>
            <input type="text" class="tbx small" id="sectortbx">
        </div>
        <div class="col-lg-3 col-sm-12 colo">
            <input type="button" class="small btn search" value="Search">
        </div>
    </div>
    <!-- Resut-->
    <h2 class="results big">2 Results</h2>
    <div class="result">
        <img src="./assets/pictures/logo.jpg" alt="Logo 1" class="logoentreprise">
        <div class="in_desc">
            <h3 class="medium">First company</h3>
            <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            <h4 class="mini loca">Evreux (27000) - Publication 04/05/2022 - IT</h4>
        </div>
        <a role="button" href="./companies_detail.php" class="small btn detail">See </a>
    </div>

    <div class="result">
        <img src="./assets/pictures/logo2.jpg" alt="Logo 2" class="logoentreprise">
        <div class="in_desc">
            <h3 class="medium">Second company</h3>
            <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            <h4 class="mini loca">Evreux (27000) - Publication 04/05/2022 - IT</h4>
        </div>
        <a role="button" href="./companies_detail.php" class="small btn detail "> See </a>
    </div>


    <footer>
        <div class="row g-0 justify-content-center">
            <!-- "Services" part of the footer-->
            <div class="col-lg-4 col-sm-12 maxi">
                <h3 class="medium">Services</h3>
                <p class="small">Partnerships</p>
                <p class="small">Blog</p>
                <p class="small">Contacts</p>
                <p class="small">FAQ</p>
            </div>
            <!-- "About" part of the footer-->
            <div class="col-lg-4 col-sm-12">
                <h3 class="medium">About</h3>
                <p class="small">Company</p>
                <p class="small">Our team</p>
                <p class="small">Careers</p>
                <p class="small">Legal terms</p>
            </div>
            <div class="col-lg-4 col-sm-12">
                <h2 class="big">VMS</h2>
                <p class="small">The french website for internships, but in english</p>
                <div>
                    <a href="http://snapchat.com/" class="social_link"><i class="fa-brands fa-snapchat big" id="snapchat_icon"></i></a>
                    <a href="http://twitter.com/" class="social_link"><i class="fa-brands fa-twitter big" id="twitter_icon"></i></a>
                    <a href="http://github.com/" class="social_link"><i class="fa-brands fa-github big" id="github_icon"></i></a>
                    <a href="http://discord.com/" class="social_link"><i class="fa-brands fa-discord big" id="discord_icon"></i></a>

                </div>
            </div>
        </div>
    </footer>
</body>

</html>