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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>

</head>

<body>



    <!-- NAVBAR -->
    <header>
        <?php
        include "./php/navbar.php";
        include "./php/profile.php";


        ?>
    </header>



    <!-- PROFILE BANNER -->
    <div class="infos">

        <div class="profile-pic">
            <form action="php/profile.php" method="post" enctype="multipart/form-data">
                <img src=<?php
                            if (is_file('assets/user_data/avatar/' . $id . '.png')) {
                                echo '/assets/user_data/avatar/' . $id . '.png';
                            }
                            // elseif('assets/user_data/avatar/'.$id.'.jpg'){
                            //     echo'/assets/user_data/avatar/'.$id.'.jpg'; 
                            // }
                            else {
                                echo "/assets/pictures/default_avatar.png";
                            }
                            ?> id="avatar" alt="Profile Picture">
                <input id="file" type="file" name="file" accept="image/png" onchange="loadFile(event)" />
                <label id="uploadbtn" for="file">
                    <span class="fa-solid fa-camera"></span>
                    <span>Change Image</span>
                </label>
        </div>
        <ul id="listinfo">
            <li><input class="medium " placeholder="Lastname" readonly="readonly" name="surname" value="<?php echo$row[0][0]; ?>"></li>
            <li><input class="medium " placeholder="Name" readonly="readonly" name="name" value="<?php echo$row[0][1]; ?>"></li>
            <li><input class="small " placeholder="Gender" readonly="readonly" name="gender" value="<?php echo$row[0][2]; ?>"></li>
            <li><input class="small " placeholder="Email" readonly="readonly" name="email" value="<?php echo$row[0][3]; ?>"></li>
            <li><input class="mini " placeholder="Age" readonly="readonly" name="age" value="<?php echo$row[0][4]; ?>"></li>
            <li>
                <div id="calendar" class="md-form md-outline input-with-post-icon datepicker">
                    <input placeholder="Select date" type="date" id="birthtbx" class="form-control tbx mini" name="birthday">
                </div>
            </li>
            <li><select id="listboxpromo" class="form-control tbx mini listbox" name="promotion">
                    <div class="list-content">
                        <?php
                        $selected="";
                        
                            if($row[0][9]==NULL){
                                $selected="selected";
                                echo "<option value='NULL'".$selected."> None </option>";
                                    }
                                    else{
                                    
                                    echo '<option value=' . $row[0][9] . 'selected>' . $row[0][5] . ' - ' . $row[0][7] . '</option>';
                                    }
                        //include "../db.php"; //Used to get global pdo
                        $stm = $pdo->prepare("SELECT id_promotion, promotion_name, promotion_type FROM promotion INNER JOIN promotion_type ON promotion.id_promotion_type = promotion_type.id_promotion_type WHERE promotion_type != '" . $row[0][7] . "' "); //query to get promotions and their type

                        $stm->execute();
                        $row1 = $stm->fetchAll();
                        

                        foreach ($row1 as $value) {
                            echo '<option value=' . "$value[0]" . '>' . $value[1] . ' - ' . $value[2] . '</option>';
                        }
                        ?>
                        
                    </div>
            </li>
            <li><input class="mini" readonly="readonly" name="promo"  value="<?php echo$row[0][5]; ?>"></li>
            <li><select id="listboxcampus" class="form-control tbx mini listbox" name="campus">
                    <div class="list-content">
                        <?php
                        // include "../db.php"; //Used to get global pdo
                        $stm1 = $pdo->prepare("SELECT id_campus, campus_name FROM campus WHERE campus_name != '" . $row[0][6] . "'"); //query to get promotions and their type
                        $stm1->execute();
                        $row2 = $stm1->fetchAll();
                        echo '<option value=' . $row[0][10] . '>' . $row[0][6] . '</option>';
                        foreach ($row2 as $value1) {
                            echo '<option value=' . "$value1[0]" . '>' . $value1[1] . '</option>';
                        }
                        ?>
                    </div>
            </li>
            <li><input class="mini " placeholder="Campus" readonly="readonly" name="camp" value="<?php echo$row[0][6]; ?>"></li>
            <li><input class="mini " placeholder="" readonly="readonly" name="promotype" value="<?php echo$row[0][7]; ?>"></li>
        </ul>
        <img id="editbutton" src="assets/icons/edit-white.svg" alt="Edit" role="button" onclick="edit()">
        <input type="submit" role="button" alt="done" id="end-editing" name="postbutton" value="postbutton">
        <?php
        if (isset($_GET["errorinputs"])) {
            if ($_GET["errorinputs"] == "1") {

                echo "Error : please fill all inputs";
            }
        } ?>

        </form>
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
    include "./php/footer.php";
    ?>




    <script src="./js/profile_user.js"></script>
</body>

</html>