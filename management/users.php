<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | User creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stylesheets/management/users.scss">
    <link rel="stylesheet" href="/stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "./php/management/role_check.php"; //import role_check.php file to check has correct role. If not : redirects immediately in 403 page
?>
<?php
include "../php/navbar.php";
?>

<body>
    <form action="../php/management/users.php" method="post">
        <div class="d-flex align-items-center justify-content-center madiv ">
            <!-- this is the white box -->
            <div class="mainbox row">
                <!--USER CREATION-->
                <div class="mantitl">
                    <h1 class="big titl">USER CREATION</h1>
                </div>
                <div class="col-sm-6 divg">
                    <div class="orga">
                        <label for="mailtbx" class="tbxindicator small">Email</label>
                        <input type="email" class="form-control tbx medium" id="mailtbx" placeholder="mail@example.com" name="c_email"> <!-- e-mail field -->
                    </div>
                    <div class="orga">
                        <label for="passtbx" class="tbxindicator small">Password</label>
                        <input type="password" class="form-control tbx medium" id="passtbx" placeholder="••••••••••" name="c_password"> <!-- password field -->
                    </div>
                    <div class="orga">
                        <label for="passtbx_rep" class="tbxindicator small">Password (repeat)</label>
                        <input type="password" class="form-control tbx medium" id="passtbx_rep" placeholder="••••••••••" name="c_password_r"> <!-- password repeat field -->
                        <?php
                        if (isset($_GET["c_pass"])) {
                            if ($_GET["c_pass"] == "1") {
                                echo '<p class="small error">Password verification failed.</p>';
                            }
                        }
                        ?>
                    </div>
                    <div class="orga">
                        <label class="custom-file-label tbxindicator">Profile picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input fil1" id="customFile" name="c_profilepic">
                            <label class="custom-file-label filelabel medium" for="customFile">Choose file</label> <!-- Profile picture field -->
                        </div>
                    </div>
                    <div class="orga">
                        <label for="campustbx" class="tbxindicator small">Campus</label> <!-- Campus field -->
                        <select class="form-control tbx medium" name="c_campus" id="campustbx">
                            <?php
                            include "../db.php"; //Used to get global pdo
                            try {
                                $stm = $pdo->prepare('SELECT campus_name FROM campus'); //prepared statement to get campuses name
                                $stm->execute();
                                $row = $stm->fetchAll();
                                foreach($row as $value)
                                {
                                    echo'<option>'.$value[0].'</option>';
                                }
                            } catch (\PDOException $e) {
                                echo $e->getMessage();
                                echo "   ";
                                echo (int)$e->getCode();
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 row divd">
                    <div class="orga">
                        <label for="lastnametbx" class="tbxindicator small">Lastname</label>
                        <input type="text" class="form-control tbx medium" id="lastnametbx" placeholder="John" name="c_firstname"> <!-- name field -->
                    </div>
                    <div class="orga">
                        <label for="firstnametbx" class="tbxindicator small">Firstname</label>
                        <input type="text" class="form-control tbx medium" id="firstnametbx" placeholder="Doe" name="c_lastname"> <!-- surname  field -->
                    </div>
                    <div class="orga2">
                        <div class="col-sm-7 orga3">
                            <!-- date of birth field -->
                            <label for="birthtbx" class="tbxindicator small">Birthday</label>
                            <div class="md-form md-outline input-with-post-icon datepicker">
                                <input placeholder="Select date" type="date" id="birthtbx" class="form-control tbx medium" name="c_birthday">
                            </div>
                        </div>
                        <div class="col-sm-5 orga3">

                            <!-- gender field -->
                            <label for="gendertbx" class="tbxindicator small">Gender</label>
                            <select class="form-control tbx medium" id="gendertbx" name="c_gender">
                                <option selected>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="orga">
                        <label for="roletbx" class="tbxindicator small">Role</label> <!-- promotion field -->
                        <select class="form-control tbx medium" id="roletbx" name="c_role">
                            <?php
                            include "../db.php"; //Used to get global pdo
                            try {
                                $stm = $pdo->prepare('SELECT role FROM role'); //query to get roles
                                $stm->execute();
                                $row = $stm->fetchAll();
                                foreach($row as $value)
                                {
                                    echo'<option>'.$value[0].'</option>';
                                }
                            } catch (\PDOException $e) {
                                echo $e->getMessage();
                                echo "   ";
                                echo (int)$e->getCode();
                            }
                            ?>
                        </select>
                    </div>
                    <div class="orga">
                        <label for="promotbx" class="tbxindicator small">Promotion</label> <!-- promotion field -->
                        <select class="form-control tbx medium" id="promotbx" name="c_promo">
                        <?php
                            include "../db.php"; //Used to get global pdo
                            try {
                                $stm = $pdo->prepare('SELECT promotion_name, promotion_type FROM promotion INNER JOIN promotion_type ON promotion.id_promotion_type = promotion_type.id_promotion_type'); //query to get promotions and their type
                                $stm->execute();
                                $row = $stm->fetchAll();
                                foreach($row as $value)
                                {
                                    echo'<option>'.$value[0] .' '.$value[1].'</option>';
                                }
                            } catch (\PDOException $e) {
                                echo $e->getMessage();
                                echo "   ";
                                echo (int)$e->getCode();
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div>
                    <!--Ci-dessous le bouton submit-->
                    <input type="submit" class="btn-primary btn Medium" id="newbtn" value="NEW ACCOUNT" name="c_user">
                    <?php
                    if (isset($_GET["c_error"])) {
                        if ($_GET["c_error"] == "1") {
                            echo '<p class="small error">Error, please try again.</p>';
                        }
                    }
                    if (isset($_GET["c_good"])) {
                        if ($_GET["c_good"] == "1") {
                            echo '<p class="small error">User successfuly created.</p>';
                        }
                    }
                    ?>
                </div>

                <!--USER DELETION-->
                <div class="mantitl">
                    <h1 class="big titl">USER DELETION</h1>
                </div>
                <div class="col-sm-6 orga">
                    <label for="maildtbx" class="tbxindicator small">Enter the email of the user to be deleted</label>
                    <input type="email" class="form-control tbx medium" id="maildtbx" placeholder="mail@example.com" name="d_email"> <!-- e-mail field -->
                </div>
                <div>
                    <!--Ci-dessous le bouton delete-->
                    <input type="submit" class="btn-primary btn Medium" id="delbtn" value="DELETE ACCOUNT" name="d_user">
                    <?php
                    if (isset($_GET["d_error"])) {
                        if ($_GET["d_error"] == "1") {
                            echo '<p class="small error">E-mail incorrect, please try again.</p>';
                        }
                    }
                    if (isset($_GET["d_good"])) {
                        if ($_GET["d_good"] == "1") {
                            echo '<p class="small error">User successfuly deleted.</p>';
                        }
                    }
                    ?>
                </div>

                <!--USER MODIFICATION FIELD-->
                <div class="mantitl">
                    <h1 class="big titl">USER MODIFICATION</h1>
                </div>
                <div class="col-sm-6 orga">
                    <label for="mmailtbx" class="tbxindicator small">Enter user email and edit his page</label>
                    <input type="email" class="form-control tbx medium" id="mmailtbx" placeholder="mail@example.com"> <!-- e-mail field -->
                </div>
                <div>
                    <!--Ci-dessous le bouton submit-->
                    <input type="submit" class="btn-primary btn Medium" id="modbtn" value="MODIFY ACCOUNT" name="m_user">
                </div>
            </div>
        </div>
        <?php
        include_once "../php/footer.php"
        ?>
    </form>
</body>

</html>