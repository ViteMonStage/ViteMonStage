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
    
</head>

<body>



    <!-- NAVBAR -->
    <header>
        <?php
        include_once "./php/navbar.php";
        include_once "./php/profile.php";
        ?>
    </header>



    <!-- PROFILE BANNER -->
        <div class="infos">
            <div class="profile-pic">
               
            <img  src=<?php 
            if(is_file('assets/user_data/avatar/'.$id.'.png'))
            {
                echo'/assets/user_data/avatar/'.$id.'.png';
            }
            else{
                echo"/assets/pictures/default_avatar.png";
            }
            ?> id="avatar" alt="Profile Picture">
             
                <input id="file" type="file" onchange="loadFile(event)"/>
                <label id="uploadbtn" for="file">
                    <span class="fa-solid fa-camera"></span>
                    <span>Change Image</span>
                </label>
            </div>
            <ul id="listinfo">
                <li class="medium"><?php print_r($row[0][0]); ?></li>
                <li class="medium"><?php print_r($row[0][1]); ?></li>
                <li class="small"><?php print_r($row[0][2]); ?></li>
                <li class="small"><?php print_r($row[0][3]); ?></li>
                <li class="mini"><?php print_r($row[0][4]); ?></li>
                <li class="mini"><?php print_r($row[0][5]); ?></li>
                <li class="mini"><?php print_r($row[0][6]); ?></li>
                <li class="mini"><?php print_r($row[0][7]); ?></li>
            </ul>
            <img id="editbutton" src="assets/icons/edit-white.svg" alt="Edit" role="button" onclick="edit()">
            <img role="button" alt="done" src="assets/icons/check-white.svg" type="submit" id="end-editing">
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
                        <a role="button" class="small btn" href="wishlist.php" alt="Wishlist">See more</a>

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
                        <a role="button" class="small btn" href="candidatures.php" alt="Candidatures">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-12 col-sm-12">
            <div class="taskbox">
                
                <div class="useracc row">
                    <ul class="row col-lg-12 list-group list-group-horizontal flex">
                        <div class="col-lg-3">
                        <li> <label class='switch mini'><input type='checkbox' id="c_search"><span></span></label><span class="mini">Search a company</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="c_modify"><span></span></label><span class="mini">Modify a company</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="c_rate"><span></span></label><span class="mini">Evaluate a company</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="c_delete"><span></span></label><span class="mini">Delete a company</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="c_stats"><span></span></label><span class="mini">See company stats</span></li>
                        </div>
                        <div class="col-lg-3">
                        <li> <label class='switch mini'><input type='checkbox' id="o_search"><span></span></label><span class="mini">Search an offer</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="o_create"><span></span></label><span class="mini">Create an offer</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="o_modify"><span></span></label><span class="mini">Modify an offer</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="o_delete"><span></span></label><span class="mini">Delete an offer</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="o_stats"><span></span></label><span class="mini">See offer stats</span></li>
                        </div>
                        <div class="col-lg-3">
                        <li> <label class='switch mini'><input type='checkbox' id="p_search"><span></span></label><span class="mini">Search a pilot</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="p_create"><span></span></label><span class="mini">Create a pilot</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="p_modify"><span></span></label><span class="mini">Modify pilot</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="p_delete"><span></span></label><span class="mini">Delete pilot</span></li>
                        </div>
                        <div class="col-lg-3">
                        <li> <label class='switch mini'><input type='checkbox' id="d_search"><span></span></label><span class="mini">Search delegate</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="d_create"><span></span></label><span class="mini">Create a delegate</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="d_modify"><span></span></label><span class="mini">Modify delegate</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="d_delete"><span></span></label><span class="mini">Delete delegate</span></li>
                        </div>
                        <div class="col-lg-3">
                        <li> <label class='switch mini'><input type='checkbox' id="st_search"><span></span></label><span class="mini">Search student</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="st_create"><span></span></label><span class="mini">Create a student</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="st_modify"><span></span></label><span class="mini">Modify a student</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="st_delete"><span></span></label><span class="mini">Delete a student</span></li>
                        <li> <label class='switch mini'><input type='checkbox' id="st_stats"><span></span></label><span class="mini">See students stats</span></li>
                        </div>
                            
                    </ul>
                </div>
            </div>
        </div>


    </div>
    
    <!-- FOOTER -->



    <?php
    include_once "./php/footer.php";
    ?>




<script src="./js/profile_user.js"></script>
</body>

</html>