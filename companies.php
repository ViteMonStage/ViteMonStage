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
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand maxi logo" href="./index.php">VMS</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav navbar-align-left navbar-margin">
                    <a class="nav-item nav-link current small" href="./index.php"><i class="fa-solid fa-house"></i> HOME</a>
                    <a class="nav-item nav-link small" href="./offers.php"><i class="fa-solid fa-list"></i> OFFERS</a>
                    <a class="nav-item nav-link small" href="./candidatures.php"><i class="fa-solid fa-circle-info"></i> APPLICATIONS</a>
                    <a class="nav-item nav-link small current" href="./companies.php"><i class="fa-solid fa-building"></i> COMPANIES</a>
                    <a class="nav-item nav-link small navbar-highlight" href="./profile_user.php"><i class="fa-solid fa-user"></i> PROFILE</a>
                    <a class="nav-item nav-link small" href="#"><i class="fa-solid fa-bell"></i><span class="show-small hide-big notification"> NOTIFICATIONS</span> <span id="notifAmount" class="badge rounded-pill bg-danger">0</span></a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head band-->
    <div class="container">
        <img src="./assets/pictures/bandeau.jpg" class="img-fluid image" alt="Responsive image">
        <div class="centered">
            <h1 class="maxi">Companies</h1>
        </div>
    </div>
    <!-- Filtre -->
    <div class="filter">

        <label for="nametbx" class="tbxindicator small">Name</label>
        <input type="text" class="tbx small" id="nametbx">


        <label for="locationtbx" class="tbxindicator small">Location</label>
        <input type="text" class="tbx small" id="locationtbx">


        <label for="sectortbx" class="tbxindicator small">Sector</label>
        <input type="text" class="tbx small" id="sectortbx">

        <input type="button" class="small btn"  value="Search">

    </div>
    <!-- Resut-->
    <h2 class="results big">2 Results</h2>
        <div class="result">
            <img src="./assets/pictures/logo.jpg" alt="Logo 1" class="logoentreprise">
            <div class="in_desc">
                <h3 class="medium">First company</h3>
                <p class="small">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
            </div>
            <input type="button" class="small btnsearch" id="searchbtn" value="See company">
        </div>
        <div class="result">
            <img src="./assets/pictures/logo2.jpg" alt="Logo 2" class="logoentreprise">
            <div class="in_desc">
                <h3 class="medium">Second company</h3>
                <p class="small">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                
            </div>
            <input type="button" class="small btnsearch" id="searchbtn" value="See company">
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