<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/index.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand maxi logo" href="./index.php">VMS</a>
            <button class="navbar-toggler pad" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav navbar-align-left navbar-margin">
                    <a class="nav-item nav-link current small" href="./index.php"><i class="fa-solid fa-house"></i> HOME</a>
                    <a class="nav-item nav-link small" href="./offers.php"><i class="fa-solid fa-list"></i> OFFERS</a>
                    <a class="nav-item nav-link small" href="./candidatures.php"><i class="fa-solid fa-circle-info"></i> CANDIDATURES</a>
                    <a class="nav-item nav-link small" href="./companies.php"><i class="fa-solid fa-building"></i> COMPANIES</a>
                    <a class="nav-item nav-link small navbar-highlight" href="./profile_user.php"><i class="fa-solid fa-user"></i> PROFILE</a>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle small admin-list" href="#" data-bs-toggle="dropdown" id="admin-list"><i class="fa-solid fa-gear"></i> ADMINISTRATION</a>
                        <div class="dropdown-menu dropdown-menu-end admin-list">
                            <a href="./management/companies.php" class="dropdown-item admin-list">Manage companies</a>
                            <a href="./management/offers.php" class="dropdown-item admin-list">Manage offers</a>
                            <a href="./management/users.php" class="dropdown-item admin-list">Manage users</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Search user</a>
                        </div>
                    </li>
                    <a class="nav-item nav-link small" href="#"><i class="fa-solid fa-bell"></i><span class="show-small hide-big notification"> NOTIFICATIONS</span> <span id="notifAmount" class="badge rounded-pill bg-danger">0</span></a>
                </div>
            </div>
        </nav>
    </header>
    <h1 class="welcome big">Welcome on VMS</h1>
    <div class="row g-0">
        <!-- "Applications" square -->
        <div class="col-lg-6 col-sm-12">
            <div class="zoom">
                <a href="./candidatures.php">
                    <img src="assets/pictures/candidatures.png" class="img" alt="meeting">
                    <div class="text-block">
                        <h4 class="big">Your applications</h4>
                        <p class="medium">Keep track your applications here.</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- "Offers" square -->
        <div class="col-lg-6 col-sm-12">
            <div class="zoom">
                <a href="./offers.php">
                    <img src="assets/pictures/shake.png" class="img" alt="shake">
                    <div class="text-block">
                        <h4 class="big">Current offers</h4>
                        <p class="medium">Check out the popular offers right now.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row g-0 justify-content-center">
        <div class="col-lg-6 col-sm-12">
            <!-- "Companies" square -->
            <div class="zoom">
                <a href="./companies.php">
                    <img src="assets/pictures/Corporations.png" class="img" alt="corporations">
                    <div class="text-block">
                        <h4 class="big">Companies</h4>
                        <p class="medium">Browse the companies here.</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- "Personnal informations" square -->
        <div class="col-lg-6 col-sm-12">
            <div class="zoom">
                <a href="./companies.php">
                    <img src="assets/pictures/paper.png" class="img" alt="paper">
                    <div class="text-block">
                        <h4 class="big">Personnal informations</h4>
                        <p class="medium">Modify your personnal informations here.</p>
                    </div>
                </a>
            </div>
        </div>
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