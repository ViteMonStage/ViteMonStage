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

    <div class="container">
        <img src=".\assets\pictures\bandeau.jpg" class="img-fluid image" alt="Responsive image">
        <div class="centered">
            <h1 class="maxi">Companies</h1>
        </div>
    </div>

    <div class="filter">

        <label for="nametbx" class="tbxindicator small">Name</label>
        <input type="text" class="tbx small" id="nametbx">


        <label for="locationtbx" class="tbxindicator small">Location</label>
        <input type="text" class="tbx small" id="locationtbx">


        <label for="sectortbx" class="tbxindicator small">Sector</label>
        <input type="text" class="tbx small" id="sectortbx">

        <input type="button" class="small btn" id="searchbtn" value="Search">

    </div>
    <h2 class="title big">2 Results</h2>
    <div class="result">
        <div class="result1">
            <img src=".\assets\pictures\logo.jpg" alt="Logo 1" class="logoentreprise">
            <h3 class="medium">First company</h3>
        </div>
        <div class="result2">
            <img src=".\assets\pictures\logo2.jpg" alt="Logo 2" class="logoentreprise">
            <h3 class="medium">Second company</h3>
            <p></p>
        </div>
    </div>
</body>

</html>