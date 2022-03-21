<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/companies.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
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
                    <a class="nav-item nav-link small" href="./index.php">HOME</a>
                    <a class="nav-item nav-link small" href="./offers.php">OFFERS</a>
                    <a class="nav-item nav-link small" href="./candidatures.php">APPLICATIONS</a>
                    <a class="nav-item nav-link small current" href="./companies.php">COMPANIES</a>
                    <a class="nav-item nav-link small navbar-highlight" href="./profile_user.php">PROFILE</a>
                </div>
            </div>
        </nav>
    </header>
<!-- Head band-->
    <div class="container">
        <img src=".\assets\pictures\bandeau.jpg" class="img-fluid image" alt="Responsive image">
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

        <input type="button" class="small btn" id="searchbtn" value="Search">
    
    </div>
    <!-- Resut-->
    <h2 class="title big">2 Results</h2>
    <div class="result">
        <div class="result1">
            <img src=".\assets\pictures\logo.jpg" alt="Logo 1" class="logoentreprise">
            <div class="in_desc">
            <h3 class="medium">First company</h3>
                <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                <h4 class="small">Evreux (27000) - Publication 04/05/2022 - IT</h4>
            </div>
        </div>
        <div class="result2">
            <img src=".\assets\pictures\logo2.jpg" alt="Logo 2" class="logoentreprise">
            <h3 class="medium">Second company</h3>
            <p></p>
        </div>
    </div>
    <footer>
        <div class="f_row">
            <!-- "Services" part of the footer-->
            <div class="f_serv">
                <h3 class="medium">Services</h3>
                <p class="small">Partnerships</p>
                <p class="small">Blog</p>
                <p class="small">Contacts</p>
                <p class="small">FAQ</p>
            </div>
            <!-- "About" part of the footer-->
            <div class="f_about">
                <h3 class="medium">About</h3>
                <p class="small">Company</p>
                <p class="small">Our team</p>
                <p class="small">Careers</p>
                <p class="small">Legal terms</p>
            </div>
            <div class="f_vtm">
                <div class="f_lorem">
                    <h2 class="big">ViteMonStage</h2>
                    <p class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                </div>
                <div class="f_social">
                    <i class="fa-brands fa-snapchat big" id="icon"></i>
                    <i class="fa-brands fa-twitter big" id="icon"></i>
                    <i class="fa-brands fa-github big" id="icon"></i>
                    <i class="fa-brands fa-discord big" id="icon"></i>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>