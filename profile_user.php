<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile Page</title>
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheets/profile_user.scss">
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
            </div>
        </nav>
    </header>





    <!-- BANNIERE PROFIL -->
    <div class="profile">
        <div class="infos">
            <img id="avatar" src="/assets/pictures/default_avatar.png" alt="Profile Picture">

            <ul>
                <li class="medium">SURNAME Name</li>
                <li class="small">Campus : Rouen</li>
                <li class="small">Sector : IT</li>
                <li class="mini">name.surname@viacesi.fr</li>
                <li class="small">Male, 20 Years Old</li>
            </ul>

            <a href="edit_user"><img id="editbutton" src="assets/icons/edit-regular.svg" alt="Edit" onclick="openImg()"></a>
        </div>
    </div>





    <!-- WISHLIST MENU AND CURRENT PROGRESS MENU   -->
    <div class="menu">

        <div class="row g-0 ">
            <div class="col-lg-6 col-sm-12">

                <!-- WISHLIST MENU -->
                <div class="wishlist">
                    <p class="medium titre">Wishlist</p>
                    <div class="scroller">
                        <div class="offerexample">
                            <a href="" class="medium">Offer example</a>
                            <a href="" class="small">Company</a>
                            <p class="mini">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ex maxime, ipsam maiores itaque sint ab, corporis est,
                                commodi quaerat dignissimos laboriosam eaque perspiciatis architecto a nostrum esse autem ut optio!
                            </p>
                            <div class="space">
                                <ul class="list mini">
                                    <li id="wcity">City</li>
                                    <li class="dot">-</li>
                                    <li id="wpublishDate">Publish Date</li>
                                    <li class="dot">-</li>
                                    <li id="wsector">Sector</li>
                                </ul>
                            </div>
                        </div>
                        <div class="offerexample">
                            <a href="" class="medium">Offer example</a>
                            <a href="" class="small">Company</a>
                            <p class="mini">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ex maxime, ipsam maiores itaque sint ab, corporis est,
                                commodi quaerat dignissimos laboriosam eaque perspiciatis architecto a nostrum esse autem ut optio!
                            </p>
                            <div class="space">
                                <ul class="list mini">
                                    <li id="wcity">City</li>
                                    <li class="dot">-</li>
                                    <li id="wpublishDate">Publish Date</li>
                                    <li class="dot">-</li>
                                    <li id="wsector">Sector</li>
                                </ul>
                            </div>
                        </div>
                        <div class="offerexample">
                            <a href="" class="medium">Offer example</a>
                            <a href="" class="small">Company</a>
                            <p class="mini">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ex maxime, ipsam maiores itaque sint ab, corporis est,
                                commodi quaerat dignissimos laboriosam eaque perspiciatis architecto a nostrum esse autem ut optio!
                            </p>
                            <div class="space">
                                <ul class="list mini">
                                    <li id="wcity">City</li>
                                    <li class="dot">-</li>
                                    <li id="wpublishDate">Publish Date</li>
                                    <li class="dot">-</li>
                                    <li id="wsector">Sector</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bouton">
                        <a role="button" class="small btn" href="wishlist.php">See more</a>

                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-sm-12">

                <!-- CANDIDATURES MENU -->
                <div class="candidatures">
                    <p class="medium titre">Current candidatures </p>
                    <div class="scroller">
                        <div class="offerexample">
                            <a href="" class="medium">Offer example</a>
                            <a href="" class="small">Company</a>
                            <p class="mini">Progress : </p>
                            <!-- PROGRESS BAR -->
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Step 4/8</div>
                            </div>
                            <p class="mini">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ex maxime, ipsam maiores itaque sint ab, corporis est,
                                commodi quaerat dignissimos laboriosam eaque perspiciatis architecto a nostrum esse autem ut optio!
                            </p>
                            <ul class="list mini">
                                <li id="ccity">City</li>
                                <li class="dot">-</li>
                                <li id="cpublishDate">Publish Date</li>
                                <li class="dot">-</li>
                                <li id="csector">Sector</li>
                            </ul>
                        </div>

                        <div class="offerexample ">
                            <a href="" class="medium">Offer example</a>
                            <a href="" class="small">Company</a>
                            <p class="mini">Progress : </p>
                            <!-- PROGRESS BAR -->
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Step 4/8</div>
                            </div>
                            <p class="mini">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ex maxime, ipsam maiores itaque sint ab, corporis est,
                                commodi quaerat dignissimos laboriosam eaque perspiciatis architecto a nostrum esse autem ut optio!
                            </p>
                            <ul class="list mini">
                                <li id="ccity">City</li>
                                <li class="dot">-</li>
                                <li id="cpublishDate">Publish Date</li>
                                <li class="dot">-</li>
                                <li id="csector">Sector</li>
                            </ul>
                        </div>
                        <div class="offerexample ">
                            <a href="" class="medium">Offer example</a>
                            <a href="" class="small">Company</a>
                            <p class="mini">Progress : </p>
                            <!-- PROGRESS BAR -->
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Step 4/8</div>
                            </div>
                            <p class="mini">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ex maxime, ipsam maiores itaque sint ab, corporis est,
                                commodi quaerat dignissimos laboriosam eaque perspiciatis architecto a nostrum esse autem ut optio!
                            </p>
                            <ul class="list mini">
                                <li id="ccity">City</li>
                                <li class="dot">-</li>
                                <li id="cpublishDate">Publish Date</li>
                                <li class="dot">-</li>
                                <li id="csector">Sector</li>
                            </ul>
                        </div>
                    </div>
                    <div class="bouton">
                                <a role="button" class="small btn" href="candidatures.php">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="taskbox">
    <ul>
        <li>Search a company <label class="switch"><input type="checkbox"><span></span></label></li>
        <li>Search a company <label class="switch"><input type="checkbox"><span></span></label></li>
    </ul>
    </div>


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