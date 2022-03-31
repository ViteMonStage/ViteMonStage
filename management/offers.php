<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Offer creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/assets/vendors/jquery /jquery-3.6.0.min.js"></script>
    <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stylesheets/management/offers.scss">
    <link rel="stylesheet" href="/stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

</head>

<body>
    <?php
    session_start();
    if ($_SESSION['role'] == 2 && $_SESSION['create_offer'] == 0 && $_SESSION['delete_offer'] == 0 && $_SESSION['modify_offer'] == 0) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('../error/403.php', TRUE);
        die($contents);
    }
    ?>
    <header>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "./php/management/role_check.php"; //import role_check.php file to check has correct role. If not : redirects immediately in 403 page
        ?>
        <?php
        include "../php/navbar.php";
        ?>
    </header>
    <form action="../php/management/offers.php" method="post">
        <div class="d-flex align-items-center justify-content-center madiv ">
            <!-- this is the white box -->
            <div class="mainbox row">
                <!-- OFFER CREATION -->
                <?php if ($_SESSION['role'] != 2 || ($_SESSION['role'] == 2 && $_SESSION['create_offer'] == 1)) : ?>
                    <div class="mantitl">
                        <h1 class="big titl">OFFER CREATION</h1>
                    </div>
                    <div class="col-sm-6 divg">
                        <div class="orga">
                            <label for="nametbx" class="tbxindicator small">Name</label>
                            <input type="text" class="form-control tbx medium" id="nametbx" placeholder="WEB IT Internship" name="c_name_offer"> <!-- name field -->
                        </div>
                        <div class="orga4">
                            <label for="desctbx" class="tbxindicator small">Description</label>
                            <textarea class="form-control ltbx medium" id="desctbx" name="c_desc_offer" placeholder="Lorem ipsum dolor sit amet. Qui consequatur doloribus quo alias repudiandae eos labore tempora. Et aspernatur ullam quo sequi illum aut rerum voluptates sed reprehenderit labore et quam maxime aut accusantium exercitationem qui quasi distinctio. Eos dignissimos eius et officia saepe eos suscipit esse et inventore quia ex commodi accusamus et reprehenderit sunt eos soluta aspernatur."></textarea> <!-- description field -->
                        </div>
                        <div class="orga">
                            <label for="comptbx" class="tbxindicator small">Company</label>
                            <select class="form-control tbx medium" name="c_company_offer" id="comptbx">
                                <?php
                                include "../db.php"; //Used to get global pdo
                                $stm = $pdo->prepare('SELECT id_company, company_name FROM company'); //query to get company ids and their name
                                $stm->execute();
                                $row = $stm->fetchAll();
                                foreach ($row as $value) {
                                    echo '<option value=' . "$value[0]" . '>' . $value[1] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="orga">
                            <label for="promotbx" class="tbxindicator small">Promotion type concerned</label>
                            <select class="form-control tbx medium" name="c_promo_offer" id="promotbx">
                                <?php
                                include "../db.php"; //Used to get global pdo
                                $stm = $pdo->prepare('SELECT id_promotion_type, promotion_type FROM promotion_type'); //query to get promotion types and ids
                                $stm->execute();
                                $row = $stm->fetchAll();
                                foreach ($row as $value) {
                                    echo '<option value=' . "$value[0]" . '>' . $value[1] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 row divd">
                        <div class="orga">
                            <label for="skilltbx" class="tbxindicator small">Skills</label>
                            <input type="text" class="form-control tbx medium" name="c_skills_offer" id="skilltbx" placeholder="Databases, HTML, CSS, PHP"> <!-- skills field -->
                        </div>
                        <div class="orga">
                            <label for="salartbx" class="tbxindicator small">Estimated salary (per month)</label>
                            <input type="text" class="form-control tbx medium" id="salartbx" placeholder="650€" name="c_salary_offer"> <!-- salary  field -->
                        </div>
                        <div class="orga2">
                            <div class="col-sm-7 orga3">
                                <!-- starting date field -->
                                <label for="starttbx" class="tbxindicator small">Starting date</label>
                                <div class="md-form md-outline input-with-post-icon datepicker">
                                    <input type="date" id="starttbx" class="form-control tbx medium" name="c_start_date_offer">
                                </div>
                            </div>
                            <div class="col-sm-5 orga3">
                                <!-- ending date field -->
                                <label for="endtbx" class="tbxindicator small">Ending date</label>
                                <div class="md-form md-outline input-with-post-icon datepicker">
                                    <input type="date" id="endtbx" class="form-control tbx medium" name="c_end_date_offer">
                                </div>
                            </div>
                        </div>
                        <div class="orga">
                            <label for="nbrtbx" class="tbxindicator small">Number of Interns</label>
                            <input type="number" class="form-control tbx medium" id="nbrtbx" placeholder="1" name="c_interns_offer"> <!-- number of interns field -->
                        </div>
                        <div class="orga">
                        </div>
                    </div>
                    <div>
                        <!--Ci-dessous le bouton submit-->
                        <input type="submit" class="btn-primary btn Medium" id="logbtn" name="c_offer" value="NEW OFFER">
                        <?php
                        if (isset($_GET["c_error"])) {
                            if ($_GET["c_error"] == "1") {
                                echo '<p class="small error">Error, please try again.</p>';
                            }
                            if ($_GET["c_error"] == "2") {
                                echo '<p class="small error">Invid character detected, please try again.</p>';
                            }
                            if ($_GET["c_error"] == "3") {
                                echo '<p class="small error">Please fill all textboxes.</p>';
                            }
                            if ($_GET["c_error"] == "4") {
                                echo '<p class="small error">Troubleshooting error.</p>';
                            }
                        }
                        if (isset($_GET["c_good"])) {
                            if ($_GET["c_good"] == "1") {
                                echo '<p class="small error">Offer successfuly created.</p>';
                            }
                        }
                        ?>
                    </div>
                <?php endif ?>

                <?php if ($_SESSION['role'] != 2 || ($_SESSION['role'] == 2 && $_SESSION['delete_offer'] == 1)) : ?>
                    <!-- OFFER DELETION -->
                    <div class="mantitl">
                        <h1 class="big titl">OFFER DELETION</h1>
                    </div>
                    <div class="col-sm-6 divg">
                        <div class="orga">
                            <label for="dnametbx" class="tbxindicator small">Enter the name of the offer to be deleted</label>
                            <input type="text" class="form-control tbx medium" id="dnametbx" placeholder="WEB IT Internship" name="d_name"> <!-- name field -->
                        </div>
                    </div>
                    <div class="col-sm-6 row divd">
                        <div class="orga">
                            <label for="dcompanytbx" class="tbxindicator small">Enter the company name</label>
                            <input type="text" class="form-control tbx medium" id="dcompanytbx" placeholder="VTM Incorporated" name="d_company"> <!-- skills field -->
                        </div>
                    </div>
                    <div>
                        <!--Ci-dessous le bouton submit-->
                        <input type="submit" class="btn-primary btn Medium" id="dlogbtn" name="d_offer" value="DELETE OFFER">
                        <?php
                        if (isset($_GET["d_error"])) {
                            if ($_GET["d_error"] == "1") {
                                echo '<p class="small error">Error, please try again.</p>';
                            }
                            if ($_GET["d_error"] == "2") {
                                echo '<p class="small error">Invid character detected, please try again.</p>';
                            }
                            if ($_GET["d_error"] == "3") {
                                echo '<p class="small error">Please fill all textboxes.</p>';
                            }
                            if ($_GET["d_error"] == "4") {
                                echo '<p class="small error">No offer with this name and company.</p>';
                            }
                        }
                        if (isset($_GET["d_good"])) {
                            if ($_GET["d_good"] == "1") {
                                echo '<p class="small error">Offer successfuly deleted.</p>';
                            }
                        }
                        ?>
                    </div>
                <?php endif ?>

                <?php if ($_SESSION['role'] != 2 || ($_SESSION['role'] == 2 && $_SESSION['modify_offer'] == 1)) : ?>
                    <!-- OFFER MODIFICATION -->
                    <div class="mantitl">
                        <h1 class="big titl">OFFER MODIFICATION</h1>
                    </div>
                    <div class="col-sm-6 divg">
                        <div class="orga">
                            <label for="nametbx" class="tbxindicator small">ID and name of the offer that u want to modify</label>
                            <select class="form-control tbx medium" name="m_id_offer" id="comptbx">
                                <?php
                                include "../db.php"; //Used to get global pdo
                                $stm = $pdo->prepare('SELECT id_offer,offer_name FROM offers'); //query to get company ids and their name
                                $stm->execute();
                                $row = $stm->fetchAll();
                                foreach ($row as $value) {
                                    echo '<option value=' . "$value[0]" . '>' . $value[0] . ' - ' . $value[1] . '</option>';
                                }
                                ?>
                            </select> <!-- name field -->
                        </div>
                        <div class="orga">
                            <label for="nametbx" class="tbxindicator small">Name</label>
                            <input type="text" class="form-control tbx medium" id="nametbx" placeholder="WEB IT Internship" name="m_name_offer"> <!-- name field -->
                        </div>
                        <div class="orga4">
                            <label for="desctbx" class="tbxindicator small">Description</label>
                            <textarea class="form-control ltbx medium" id="desctbx" name="m_desc_offer" placeholder="Lorem ipsum dolor sit amet. Qui consequatur doloribus quo alias repudiandae eos labore tempora. Et aspernatur ullam quo sequi illum aut rerum voluptates sed reprehenderit labore et quam maxime aut accusantium exercitationem qui quasi distinctio. Eos dignissimos eius et officia saepe eos suscipit esse et inventore quia ex commodi accusamus et reprehenderit sunt eos soluta aspernatur."></textarea> <!-- description field -->
                        </div>
                        <div class="orga">
                            <label for="promotbx" class="tbxindicator small">Promotion type concerned</label>
                            <select class="form-control tbx medium" name="m_promotion_type" id="promotbx">
                                <?php
                                include "../db.php"; //Used to get global pdo
                                $stm = $pdo->prepare('SELECT * FROM promotion_type'); //query to get promotion types and ids
                                $stm->execute();
                                $row = $stm->fetchAll();
                                foreach ($row as $value) {
                                    echo '<option>' . $value[1] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 row divd">
                        <div class="orga">
                            <label for="skilltbx" class="tbxindicator small">Skills</label>
                            <input type="text" class="form-control tbx medium" name="m_skills_offer" id="skilltbx" placeholder="Databases, HTML, CSS, PHP"> <!-- skills field -->
                        </div>
                        <div class="orga">
                            <label for="salartbx" class="tbxindicator small">Estimated salary (per month)</label>
                            <input type="text" class="form-control tbx medium" id="salartbx" placeholder="650€" name="m_salary_offer"> <!-- salary  field -->
                        </div>
                        <div class="orga2">
                            <div class="col-sm-7 orga3">
                                <!-- starting date field -->
                                <label for="starttbx" class="tbxindicator small">Starting date</label>
                                <div class="md-form md-outline input-with-post-icon datepicker">
                                    <input type="date" id="starttbx" class="form-control tbx medium" name="m_start_date_offer">
                                </div>
                            </div>
                            <div class="col-sm-5 orga3">
                                <!-- ending date field -->
                                <label for="endtbx" class="tbxindicator small">Ending date</label>
                                <div class="md-form md-outline input-with-post-icon datepicker">
                                    <input type="date" id="endtbx" class="form-control tbx medium" name="m_end_date_offer">
                                </div>
                            </div>
                        </div>
                        <div class="orga">
                            <label for="nbrtbx" class="tbxindicator small">Number of Interns</label>
                            <input type="number" class="form-control tbx medium" id="nbrtbx" placeholder="1" name="m_interns_offer"> <!-- number of interns field -->
                        </div>
                        <div class="orga">
                        </div>
                    </div>

                    <div>
                        <!--Ci-dessous le bouton submit-->
                        <input type="submit" class="btn-primary btn Medium" id="mlogbtn" name="m_offer" value="MODIFY OFFER">
                        <?php
                        if (isset($_GET["m_error"])) {
                            if ($_GET["m_error"] == "1") {
                                echo '<p class="small error">Error, please try again.</p>';
                            }
                            if ($_GET["m_error"] == "2") {
                                echo '<p class="small error">Invid character detected, please try again.</p>';
                            }
                            if ($_GET["m_error"] == "3") {
                                echo '<p class="small error">Please fill all textboxes.</p>';
                            }
                            if ($_GET["m_error"] == "4") {
                                echo '<p class="small error">No offer with this name and company.</p>';
                            }
                        }
                        if (isset($_GET["m_good"])) {
                            if ($_GET["m_good"] == "1") {
                                echo '<p class="small error">Offer successfuly modified.</p>';
                            }
                        }
                        ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </form>
    <?php
    include "../php/footer.php"
    ?>
</body>

</html>