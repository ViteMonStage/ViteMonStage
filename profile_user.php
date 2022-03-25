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
        <?php
        include "./php/navbar.php";
        ?>
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

        <div class="row g-3 ">
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
    <div class="row g-0">
        <div class="col-lg-12 col-sm-12">
            <div class="taskbox">

                <div class="column">
                    <ul>
                        
                        <li> <label class='switch'><input type='checkbox' id="c_search"><span></span></label><label for="c_search">Search a company</label></li>
                        <li> <label class='switch'><input type='checkbox' id="c_modify"><span></span></label><label for="c_modify">Modify a company</label></li>
                        <li> <label class='switch'><input type='checkbox' id="c_rate"><span></span></label><label for="c_rate">Evaluate a company</label></li>
                        <li> <label class='switch'><input type='checkbox' id="c_delete"><span></span></label><label for="c_delete">Delete a company</label></li>
                        <li> <label class='switch'><input type='checkbox' id="c_stats"><span></span></label><label for="c_stats">See company stats</label></li>
                        <li> <label class='switch'><input type='checkbox' id="o_search"><span></span></label><label for="o_search">Search an offer</label></li>
                        <li> <label class='switch'><input type='checkbox' id="o_create"><span></span></label><label for="o_create">Create an offer</label></li>
                        <li> <label class='switch'><input type='checkbox' id="o_modify"><span></span></label><label for="o_modify">Modify an offer</label></li>
                        <li> <label class='switch'><input type='checkbox' id="o_delete"><span></span></label><label for="o_delete">Delete an offer</label></li>
                        <li> <label class='switch'><input type='checkbox' id="o_stats"><span></span></label><label for="o_stats">See offer stats</label></li>
                        <li> <label class='switch'><input type='checkbox' id="p_search"><span></span></label><label for="p_search">Search a pilot</label></li>
                        <li> <label class='switch'><input type='checkbox' id="p_create"><span></span></label><label for="p_create">Create a pilot</label></li>
                        <li> <label class='switch'><input type='checkbox' id="p_modify"><span></span></label><label for="p_modify">Modify pilot</label></li>
                        <li> <label class='switch'><input type='checkbox' id="p_delete"><span></span></label><label for="p_delete">Delete pilot</label></li>
                        <li> <label class='switch'><input type='checkbox' id="d_search"><span></span></label><label for="d_search">Search delegate</label></li>
                        <li> <label class='switch'><input type='checkbox' id="d_create"><span></span></label><label for="d_create">Create a delegate</label></li>
                        <li> <label class='switch'><input type='checkbox' id="d_modify"><span></span></label><label for="d_modify">Modify delegate</label></li>
                        <li> <label class='switch'><input type='checkbox' id="d_delete"><span></span></label><label for="d_delete">Delete delegate</label></li>
                        <li> <label class='switch'><input type='checkbox' id="st_search"><span></span></label><label for="st_search">Search student</label></li>
                        <li> <label class='switch'><input type='checkbox' id="st_create"><span></span></label><label for="st_create">Create a student</label></li>
                        <li> <label class='switch'><input type='checkbox' id="st_modify"><span></span></label><label for="st_modify">Modify a student</label></li>
                        <li> <label class='switch'><input type='checkbox' id="st_delete"><span></span></label><label for="st_delete">Delete a student</label></li>
                        <li> <label class='switch'><input type='checkbox' id="st_stats"><span></span></label><label for="st_stats">See students stats</label></li>

                    </ul>
                </div>
            </div>
        </div>


    </div>
    
    <!-- FOOTER -->



    <?php
    include "./php/footer.php";
    ?>





</body>

</html>