<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Companies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/companies_details.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>


    <!-- Nav bar-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand maxi logo" href="./index.php">VMS</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav navbar-align-left navbar-margin">
                    <a class="nav-item nav-link small" href="./index.php"><i class="fa-solid fa-house"></i> HOME</a>
                    <a class="nav-item nav-link small" href="./offers.php"><i class="fa-solid fa-list"></i> OFFERS</a>
                    <a class="nav-item nav-link small" href="./candidatures.php"><i class="fa-solid fa-circle-info"></i> CANDIDATURES</a>
                    <a class="nav-item nav-link small current" href="./companies.php"><i class="fa-solid fa-building"></i> COMPANIES</a>
                    <a class="nav-item nav-link small navbar-highlight" href="./profile_user.php"><i class="fa-solid fa-user"></i> PROFILE</a>
                    <a class="nav-item nav-link small" href="#"><i class="fa-solid fa-bell"></i><span class="show-small hide-big notification"> NOTIFICATIONS</span> <span id="notifAmount" class="badge rounded-pill bg-danger">0</span></a>
                </div>
            </div>
        </nav>
    </header>
        <div class="company">
            <img src="./assets/pictures/logo.jpg" alt="Logo 1" class="logoentreprise">
            <div class="in_desc">
                <h3 class="medium">Name of the company</h3>
                <p class="small">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                <h4 class="mini">Confiance des pilotes : 8.7/10</h4>
            </div>
            <a role="button"  href="./companies_detail.php" class="small btn company" >Postulate</a>
            <a role="button"  href="./companies_detail.php" class="small btn company" >Invisible </a>
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