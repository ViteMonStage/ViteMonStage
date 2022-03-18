<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="./stylesheets/offers.scss">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand maxi logo" href="./index.php">VMS</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav navbar-align-left navbar-margin">
                    <a class="nav-item nav-link current small" href="#">HOME</a>
                    <a class="nav-item nav-link small" href="#">OFFERS</a>
                    <a class="nav-item nav-link small" href="#">APPLICATIONS</a>
                    <a class="nav-item nav-link small" href="#">COMPANIES</a>
                    <a class="nav-item nav-link small navbar-highlight" href="#">PROFILE</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container offerimg">
        <img src="assets/pictures/offres.png" class="img" alt="offres">
        <div class="text-block">
            <h4 class="big">Offers</h4>
            <p class="medium">Check out the popular offers right now.</p>
        </div>
    </div>
    <div>
        
        <label for="nametbx" class="tbxindicator small">Name</label>
        <input type="text" class="tbx small" id="nametbx">
        
       
        <label for="locationtbx" class="tbxindicator small">Location</label>
        <input type="text" class="tbx small" id="locationtbx">
        
       
        <label for="sectortbx" class="tbxindicator small">Sector</label>
        <input type="text" class="tbx small" id="sectortbx">
      
        <input type="button" class="small btn" id="searchbtn" value="Search">

    </div>


</body>

</html>