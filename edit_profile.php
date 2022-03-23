<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile Page</title>
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheets/edit_profile.scss">
    <link rel="stylesheet" href="stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <script src="script.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand maxi logo" href="./index.php">VMS</a>
        <button class="navbar-toggler pad" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav navbar-align-left navbar-margin">
                <a class="nav-item nav-link small" href="./index.php"><i class="fa-solid fa-house"></i> HOME</a>
                <a class="nav-item nav-link small" href="./offers.php"><i class="fa-solid fa-list"></i> OFFERS</a>
                <a class="nav-item nav-link small" href="./candidatures.php"><i class="fa-solid fa-circle-info"></i> CANDIDATURES</a>
                <a class="nav-item nav-link small" href="./companies.php"><i class="fa-solid fa-building"></i> COMPANIES</a>
                <a class="nav-item nav-link small current navbar-highlight" href="./profile_user.php"><i class="fa-solid fa-user"></i> PROFILE</a>
                <li class="dropdown">
                        <a class="nav-link dropdown-toggle small admin-list" href="#" data-bs-toggle="dropdown" id="admin-list"><i class="fa-solid fa-gear"></i> ADMINISTRATION</a>
                        <div class="dropdown-menu dropdown-menu-end admin-list">
                            <a href="#" class="dropdown-item admin-list">Manage company</a>
                            <a href="#" class="dropdown-item admin-list">Manage offer</a>
                            <a href="#" class="dropdown-item admin-list">Manage user</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Search user</a>
                        </div>
                    </li>
                <a class="nav-item nav-link small" href="#"><i class="fa-solid fa-bell"></i><span class="show-small hide-big notification"> NOTIFICATIONS</span> <span id="notifAmount" class="badge rounded-pill bg-danger">0</span></a>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1 class="big">Edit Profile</h1>
        <hr>
        <div class="row">
        <!-- left column -->
        <div class="col-md-3" id="leftcol">
            <div class="text-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
            <h6 class="small">Upload a different photo...</h6>
            
            <input type="file" class="form-control small">
            </div>
        </div>
        
        <!-- edit form column -->
        <div class="col-md-9 personal-info" id="rightcol">
            <h3 class="medium">Personal info</h3>
            <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-lg-3 control-label small">First name:</label>
                <div class="col-lg-12">
                <input class="form-control small" type="text" placeholder="John">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label small">Last name:</label>
                <div class="col-lg-12">
                <input class="form-control small" type="text" placeholder="Doe">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label small">Email:</label>
                <div class="col-lg-12">
                <input class="form-control small" type="text" value="johndoe@viacesi.fr" readonly>
                </div>
            </div>
            <div>
            <a class="col-lg-4 nav-item nav-link small navbar-highlight butconf" href="#"><i class="fa-solid fa-user"></i> Confirm </a>
            </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <hr>

        <!-- FOOTER -->
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