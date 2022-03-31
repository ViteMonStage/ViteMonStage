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
                            if (is_file('assets/user_data/avatar/' . $id_user . '.png')) {
                                echo '/assets/user_data/avatar/' . $id_user . '.png';
                            }
                            // elseif('assets/user_data/avatar/'.$id_user.'.jpg'){
                            //     echo'/assets/user_data/avatar/'.$id_user.'.jpg'; 
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
            <li><input class="medium " placeholder="Lastname" readonly="readonly" name="surname" value="<?php echo $row[0][0]; ?>"></li>
            <li><input class="medium " placeholder="Name" readonly="readonly" name="name" value="<?php echo $row[0][1]; ?>"></li>
            <li><input class="small " placeholder="Gender" readonly="readonly" name="gender" value="<?php echo $row[0][2]; ?>"></li>
            <li><input class="small " placeholder="Email" readonly="readonly" name="email" value="<?php echo $row[0][3]; ?>"></li>
            <li><input class="mini " placeholder="Age" readonly="readonly" name="age" value="<?php echo $row[0][4] . " years old"; ?>"></li>
            <li>
                <div id="calendar" class="md-form md-outline input-with-post-icon datepicker">
                    <input placeholder="Select date" type="date" id="birthtbx" class="form-control tbx mini" name="birthday" value="<?php echo $birthday
                                                                                                                                    ?>">
                </div>
            </li>
            <li><select id="listboxpromo" class="form-control tbx mini listbox" name="promotion">
                    <div class="list-content">
                        <?php

                        if ($row[0][9] == NULL) {
                            $selected = "selected";
                            echo "<option value='NULL'" . $selected . "> None </option>";
                        } else {
                            echo "<option value='NULL'> None </option>";
                            echo '<option value="' . $row[0][9] . '"selected>' . $row[0][5] . ' - ' . $row[0][7] . '</option>';
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
            <li><input class="mini" readonly="readonly" name="promo" value="<?php echo $row[0][5]; ?>"></li>
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
            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
            <li><input class="mini " placeholder="Campus" readonly="readonly" name="camp" value="<?php echo $row[0][6]; ?>"></li>
            <li><input class="mini " placeholder="" readonly="readonly" name="promotype" value="<?php echo $row[0][7]; ?>"></li>
        </ul>
        <img id="editbutton" src="assets/icons/edit-white.svg" alt="Edit" role="button" onclick="edit()">
        <input type="submit" role="button" alt="done" id="end-editing" name="postbutton" value="postbutton">
        <?php
        if (isset($_GET["errorinputs"])) {
            switch ($_GET["errorinputs"]) {
                case 1:

                    echo "Error 1 : please fill all fields";
                    break;
                case 2:

                    echo "Error 2 : forbidden characters inserted";
                    break;
                case 3:

                    echo "Error 3 : You don't have permission to edit this user";
            }
        } ?>

        </form>
    </div>





    <!-- WISHLIST MENU AND CURRENT PROGRESS MENU   -->
    <div class="menu">

        <div class="row g-2 justify-content-center ">
            <div class="col-lg-6 col-sm-12 ">

                <!-- WISHLIST MENU -->
                <div class="wishlist">
                    <?php if ($_SESSION['role'] == 4 || $_SESSION['role'] == 1) :    ?><p class="medium titre">Wishlist</p>
                    <?php else :    ?><p class="medium titre">You do not have access to a wishlist</p><?php endif ?>
                    <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 4) :    ?>
                        <div class="scroller">
                            <?php loadWishlist() ?>
                        </div>
                        <div class="bouton">
                            <a role="button" id="btnwish" class="small btn" href='wishlist.php?id_user=<?php echo $id_user?>' alt="Wishlist">See more</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12 ">
                <!-- CANDIDATURES MENU -->
                <div class="candidatures">
                    <?php if ($_SESSION['role'] == 4 || $_SESSION['role'] == 1) :    ?><p class="medium titre">Current candidatures </p>
                    <?php else :    ?><p class="medium titre">You do not have access to a wishlist</p><?php endif ?>
                    <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 4) :    ?>

                        <div class="scroller">
                            <?php loadCandidatures() ?>
                        </div>
                        <div class="bouton">
                            <a role="button" id="btncand" class="small btn" href="candidatures.php?id_user=<?php echo $id_user?>" alt="Candidatures">See more</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    $email = $row[0][3];
    $stm = $pdo->prepare("SELECT id_role FROM user WHERE email=?"); //query to get profile role
    $stm->bindParam(1, $row[0][3]);
    $stm->execute();
    $row1 = $stm->fetchAll();
    $role = $row1[0][0];
    if ($role == 2 && $_SESSION['role'] != 2) :    ?>
        <div class="row g-0">
            <div class="col-lg-10 col-sm-10 divcheck">
                <div class="taskbox">
                    <div class="useracc row">
                        <div class="mantitl">
                            <h1 class="big titl">DELEGATE PERMISSIONS</h1>
                        </div>
                        <form action="../php/permissions.php?id_user=9" method="post">
                            <?php
                            $email = $row[0][3];
                            $stm = $pdo->prepare("SELECT search_company, create_company, modify_company, evaluate_company, delete_company, stats_company, search_offer, create_offer, modify_offer, delete_offer, stats_offer, search_pilot, create_pilot, modify_pilot, delete_pilot, search_delegate, create_delegate, modify_delegate, delete_delegate, search_student, create_student, modify_student, delete_student, stats_student FROM permission INNER JOIN user ON permission.id_user = user.id_user WHERE email = ? "); //query to get PERMISSIONS
                            $stm->bindParam(1, $email);
                            $stm->execute();
                            $row1 = $stm->fetchAll();
                            ?>
                            <ul class="row col-lg-12 list-group list-group-horizontal flex ">
                                <div class="col-lg-2 chec">
                                    <li> <label class='switch mini'><input type='checkbox' id="c_search" name="c1" <?php if ($row1[0][0]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Search a company</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="c_create" name="c2" <?php if ($row1[0][1]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Create a company</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="c_modify" name="c3" <?php if ($row1[0][2]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Modify a company</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="c_rate" name="c4" <?php if ($row1[0][3]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Evaluate a company</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="c_delete" name="c5" <?php if ($row1[0][4]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Delete a company</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="c_stats" name="c6" <?php if ($row1[0][5]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">See company stats</span></li>
                                </div>
                                <div class="col-lg-2 chec">
                                    <li> <label class='switch mini'><input type='checkbox' id="o_search" name="c7" <?php if ($row1[0][6]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Search an offer</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="o_create" name="c8" <?php if ($row1[0][7]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Create an offer</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="o_modify" name="c9" <?php if ($row1[0][8]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Modify an offer</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="o_delete" name="c10" <?php if ($row1[0][9]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Delete an offer</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="o_stats" name="c11" <?php if ($row1[0][10]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">See offer stats</span></li>
                                </div>
                                <div class="col-lg-2 chec">
                                    <li> <label class='switch mini'><input type='checkbox' id="p_search" name="c12" <?php if ($row1[0][11]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Search a pilot</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="p_create" name="c13" <?php if ($row1[0][12]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Create a pilot</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="p_modify" name="c14" <?php if ($row1[0][13]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Modify pilot</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="p_delete" name="c15" <?php if ($row1[0][14]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Delete pilot</span></li>
                                </div>
                                <div class="col-lg-2 chec">
                                    <li> <label class='switch mini'><input type='checkbox' id="d_search" name="c16" <?php if ($row1[0][15]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Search delegate</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="d_create" name="c17" <?php if ($row1[0][16]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Create a delegate</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="d_modify" name="c18" <?php if ($row1[0][17]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Modify delegate</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="d_delete" name="c19" <?php if ($row1[0][18]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">Delete delegate</span></li>
                                </div>
                                <div class="col-lg-2 chec">
                                    <li> <label class='switch mini'><input type='checkbox' id="st_search" name="c20" <?php if ($row1[0][19]) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>><span></span></label><span class="mini">Search student</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="st_create" name="c21" <?php if ($row1[0][20]) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>><span></span></label><span class="mini">Create a student</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="st_modify" name="c22" <?php if ($row1[0][21]) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>><span></span></label><span class="mini">Modify a student</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="st_delete" name="c23" <?php if ($row1[0][22]) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>><span></span></label><span class="mini">Delete a student</span></li>
                                    <li> <label class='switch mini'><input type='checkbox' id="st_stats" name="c24" <?php if ($row1[0][23]) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>><span></span></label><span class="mini">See students stats</span></li>
                                </div>
                            </ul>
                            <input type="submit" class="small btnx" alt="permissions" value="Apply permissions" name="check_sub">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endif
    ?>
    <!-- FOOTER -->



    <?php
    include "./php/footer.php";
    ?>




    <script src="./js/profile_user.js"></script>
</body>

</html>