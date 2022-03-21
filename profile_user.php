<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>My Profile Page</title>
    <link rel="stylesheet" href="stylesheets/profile_user.scss">
    <link rel="stylesheet" href="stylesheets/global.scss">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <script src="script.js"></script>
</head>
<body>
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

    <div class="profile">
    <div class="infos">
    <img id="avatar" src="/assets/pictures/default_avatar.png" alt="Profile Picture" >
    
        <ul>
    <li class="medium">SURNAME Name</li>
    <li class="small">Campus : Rouen</li>
    <li class="small">Sector : IT</li>
    <li class="small">name.surname@viacesi.fr</li>
    <li class="small">Male, 20 Years Old</li>
        </ul>  
    
    <img id="editbutton" src="assets/icons/edit-regular.svg" alt="Edit" onclick="openImg()" > 
    </div>
    </div>
    <div class="menu">
    <div class="wishlist">
    <p class="medium titre">Wishlist</p>
        <div class="offerexample">
            <a href="" class="medium">Offer example</a>
            <a href="" class="small">Company</a>
            <p class="mini">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Ex maxime, ipsam maiores itaque sint ab, corporis est, 
                commodi quaerat dignissimos laboriosam eaque perspiciatis architecto a nostrum esse autem ut optio!
            </p>
            <ul class="list mini">
                <li id="city">City</li>
                <li id="dot1"><img src="../assets/icons/circle-solid.svg" alt="-"></li>
                <li id="publishDate">Publish Date</li>
                <li id="dot2"><img src="../assets/icons/circle-solid.svg" alt="-"></li>
                <li id="sector">Sector</li>
            </ul>
            <button type="button" class="btn btn-outline-success text-right">See more</button>
        </div>

    </div>

    <div class="candidatures">
    <p class="medium">Current candidatures </p>
        <div class="offerexample">
            <a href="" class="medium">Offer example</a>
            <a href="" class="small">Company</a>
            <p class="mini">Progress : </p>
            <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>


        </div>

    </div>
    </div>

</body>
</html>