<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Company creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stylesheets/management/companies.scss">
    <link rel="stylesheet" href="/stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

</head>

<body>
    <header>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "./php/management/role_check.php"; //import role_check.php file to check has correct role. If not : redirects immediately in 403 page
        ?>
        <?php
        include "../php/navbar.php"
        ?>
    </header>
    <form action="../php/management/companies.php" method="post">
        <div class="d-flex align-items-center justify-content-center madiv ">
            <!-- this is the white box -->
            <div class="mainbox row">

                <!-- COMPANY CREATION -->
                <div class="mantitl">
                    <h1 class="big titl">COMPANY CREATION</h1>
                </div>
                <div class="col-sm-6 divg">
                    <div class="orga">
                        <label for="nametbx" class="tbxindicator small">Name</label>
                        <input type="text" class="form-control tbx medium" id="nametbx" placeholder="VTM Incorporated" name="c_name"> <!-- name field -->
                    </div>
                    <div class="orga">
                        <label for="mailtbx" class="tbxindicator small">Email</label>
                        <input type="text" class="form-control tbx medium" id="mailtbx" placeholder="VTM.Incorporated@vtm.com" name="c_mail"> <!-- email field -->
                    </div>
                    <div class="orga">
                    </div>
                    <div class="orga">
                        <label for="citytbx" class="tbxindicator small">City</label>
                        <select class="form-control tbx medium" id="citytbx" name="c_city">
                            <!-- city name field -->
                            <?php
                            include "../db.php"; //Used to get global pdo
                            $stm = $pdo->prepare('SELECT id_city, cityname, zipcode FROM city');
                            $stm->execute();
                            $row = $stm->fetchAll();
                            foreach ($row as $value) {
                                echo '<option value=' . "$value[0]" . '>' . $value[1] . ' - ' . $value[2] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="orga">
                        <label for="stnametbx" class="tbxindicator small">Street Name</label>
                        <input type="text" class="form-control tbx medium" id="stnametbx" placeholder="Garry Vignot boulevard" name="c_street_name"> <!-- street name field -->
                    </div>
                    <div class="orga">
                        <label for="stnumbtbx" class="tbxindicator small">Street Number</label>
                        <input type="text" class="form-control tbx medium" id="stnumbtbx" placeholder="22 bis" name="c_street_number"> <!-- street number field -->
                    </div>
                </div>
                <div class="col-sm-6 row divd">
                    <div class="orga">
                        <label for="sectortbx" class="tbxindicator small">Sector</label> <!-- sector field -->
                        <input type="text" class="form-control tbx medium" id="sectortbx" placeholder="Electronics" name="c_sector"> <!-- sector field -->
                    </div>
                    <div class="orga4">
                        <label for="desctbx" class="tbxindicator small">Description*</label>
                        <textarea class="form-control ltbx medium" id="desctbx" name="c_desc" placeholder="Lorem ipsum dolor sit amet. Qui consequatur doloribus quo alias repudiandae eos labore tempora. Et aspernatur ullam quo sequi illum aut rerum voluptates sed reprehenderit labore et quam maxime aut accusantium exercitationem qui quasi distinctio. Eos dignissimos eius et officia saepe eos suscipit esse et inventore quia ex commodi accusamus et reprehenderit sunt eos soluta aspernatur."></textarea> <!-- description field -->
                    </div>
                    <div class="orga">
                        <label for="bnametbx" class="tbxindicator small">Building Name*</label>
                        <input type="text" class="form-control tbx medium" id="bnametbx" placeholder="Almas Tower" name="c_building_name"> <!-- building name field -->
                    </div>
                    <div class="orga">
                        <label for="floortbx" class="tbxindicator small">Floor*</label>
                        <input type="number" class="form-control tbx medium" id="floortbx" placeholder="57" name="c_floor"> <!-- floor number field -->
                    </div>
                    <div class="orga">
                        <label class="custom-file-label tbxindicator">Profile picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input fil1" id="customFile" name="c_profilepic">
                            <label class="custom-file-label filelabel medium" for="customFile">Choose file</label> <!-- Profile picture field -->
                        </div>
                    </div>
                </div>

                <div>
                    <!--Ci-dessous le bouton submit-->
                    <input type="submit" class="btn-primary btn Medium" id="logbtn" value="NEW COMPANY" name="c_company">
                    <?php
                    if (isset($_GET["c_error"])) {
                        if ($_GET["c_error"] == "1") {
                            echo '<p class="small error">Error, please try again.</p>';
                        }
                        if ($_GET["c_error"] == "2") {
                            echo '<p class="small error">Invid character detected, please try again.</p>';
                        }
                        if ($_GET["c_error"] == "3") {
                            echo '<p class="small error">Please fill all mandatory textboxes.</p>';
                        }
                    }
                    if (isset($_GET["c_good"])) {
                        if ($_GET["c_good"] == "1") {
                            echo '<p class="small error">Company successfuly created.</p>';
                        }
                    }
                    ?>
                </div>


                <!-- COMPANY DELETION -->
                <div class="mantitl">
                    <h1 class="big titl">COMPANY DELETION</h1>
                </div>
                <div class="col-sm-6 divg">
                    <div class="orga">
                        <label for="dnametbx" class="tbxindicator small">Enter the name of the company to be deleted</label>
                        <input type="text" class="form-control tbx medium" id="dnametbx" placeholder="VTM Incorporated" name="d_name"> <!-- name field -->
                    </div>
                </div>
                <div>
                    <!--Ci-dessous le bouton delete-->
                    <input type="submit" class="btn-primary btn Medium" id="dlogbtn" value="DELETE COMPANY" name="d_company">
                    <?php
                    if (isset($_GET["d_error"])) {
                        if ($_GET["d_error"] == "1") {
                            echo '<p class="small error">Error, please try again.</p>';
                        }
                        if ($_GET["d_error"] == "2") {
                            echo '<p class="small error">Company does not exist.</p>';
                        }
                        if ($_GET["d_error"] == "3") {
                            echo '<p class="small error">Please fill all mandatory textboxes.</p>';
                        }
                    }
                    if (isset($_GET["d_good"])) {
                        if ($_GET["d_good"] == "1") {
                            echo '<p class="small error">Company successfuly deleted.</p>';
                        }
                    }
                    ?>
                </div>

                <!-- COMPANY MODIFICATION -->
                <div class="mantitl">
                    <h1 class="big titl">COMPANY MODIFICATION</h1>
                </div>
                <div class="col-sm-6 divg">
                    <div class="orga">
                        <label for="mnametbx" class="tbxindicator small">Name</label>
                        <input type="text" class="form-control tbx medium" id="mnametbx" placeholder="VTM Incorporated"> <!-- name field -->
                    </div>
                </div>
                <div>
                    <!--Ci-dessous le bouton submit-->
                    <input type="submit" class="btn-primary btn Medium" id="mlogbtn" value="MODIFY COMPANY" name="m_company">
                </div>
            </div>
        </div>
    </form>
    <?php
    include "../php/footer.php"
    ?>
</body>

</html>