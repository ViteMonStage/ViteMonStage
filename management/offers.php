<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Offer creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stylesheets/management/offers.scss">
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
                <!-- OFFER CREATION -->
                <div class="mantitl">
                    <h1 class="big titl">OFFER CREATION</h1>
                </div>
                <div class="col-sm-6 divg">
                    <div class="orga">
                        <label for="nametbx" class="tbxindicator small">Name</label>
                        <input type="text" class="form-control tbx medium" id="nametbx" placeholder="WEB IT Internship" name="c_name"> <!-- name field -->
                    </div>
                    <div class="orga4">
                        <label for="desctbx" class="tbxindicator small">Description</label>
                        <textarea class="form-control ltbx medium" id="desctbx" name="c_desc" placeholder="Lorem ipsum dolor sit amet. Qui consequatur doloribus quo alias repudiandae eos labore tempora. Et aspernatur ullam quo sequi illum aut rerum voluptates sed reprehenderit labore et quam maxime aut accusantium exercitationem qui quasi distinctio. Eos dignissimos eius et officia saepe eos suscipit esse et inventore quia ex commodi accusamus et reprehenderit sunt eos soluta aspernatur."></textarea> <!-- description field -->
                    </div>
                    <div class="orga">
                        <label for="comptbx" class="tbxindicator small">Company</label>
                        <select class="form-control tbx medium" name="c_company" id="comptbx">
                            <?php
                            include "../db.php"; //Used to get global pdo
                            $stm = $pdo->prepare('SELECT id_company, company_name FROM company'); //query to get promotions and their type
                            $stm->execute();
                            $row = $stm->fetchAll();
                            foreach ($row as $value) {
                                echo '<option value=' . "$value[0]" . '>' . $value[1] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <label class="tbxindicator Medium promotex">Promotions concerned</label>
                    <div>
                        <div class="ccheck">
                            <!-- Promotions concerned field -->
                            <?php
                            $stm = $pdo->prepare('SELECT id_promotion, promotion_name, promotion_type FROM promotion INNER JOIN promotion_type ON promotion.id_promotion_type = promotion_type.id_promotion_type'); //query to get promotions and their type
                            $stm->execute();
                            $row = $stm->fetchAll();
                            foreach ($row as $value) {
                                echo '
                                <div class="checkb">
                                <input type="checkbox" class="medium txbx" id="promtbx1" name="' . $value[0] . '">
                                <label for="promtbx1" class="tbxindicator mini">' . $value[1] . '-' . $value[2] . '</label>
                                </div>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 row divd">
                    <div class="orga">
                        <label for="skilltbx" class="tbxindicator small" name="c_skills">Skills</label>
                        <input type="text" class="form-control tbx medium" id="skilltbx" placeholder="Databases, HTML, CSS, PHP"> <!-- skills field -->
                    </div>
                    <div class="orga">
                        <label for="salartbx" class="tbxindicator small" name="c_salary">Estimated salary (per month)</label>
                        <input type="text" class="form-control tbx medium" id="salartbx" placeholder="650€"> <!-- salary  field -->
                    </div>
                    <div class="orga2">
                        <div class="col-sm-7 orga3">
                            <!-- starting date field -->
                            <label for="starttbx" class="tbxindicator small">Starting date</label>
                            <div class="md-form md-outline input-with-post-icon datepicker">
                                <input type="date" id="starttbx" class="form-control tbx medium" name="c_start_date">
                            </div>
                        </div>
                        <div class="col-sm-5 orga3">
                            <!-- ending date field -->
                            <label for="endtbx" class="tbxindicator small">Ending date</label>
                            <div class="md-form md-outline input-with-post-icon datepicker">
                                <input type="date" id="endtbx" class="form-control tbx medium" name="c_end_date">
                            </div>
                        </div>
                    </div>
                    <div class="orga">
                        <label for="nbrtbx" class="tbxindicator small">Number of Interns</label>
                        <input type="number" class="form-control tbx medium" id="nbrtbx" placeholder="1" name="c_interns"> <!-- number of interns field -->
                    </div>
                    <div class="orga">
                        <label for="promotbx" class="tbxindicator small">Promotion</label> <!-- promotion field -->
                        <select class="form-control tbx medium" id="promotbx" name="c_promo">
                            <?php
                            include "../db.php"; //Used to get global pdo
                            $stm = $pdo->prepare('SELECT id_promotion, promotion_name, promotion_type FROM promotion INNER JOIN promotion_type ON promotion.id_promotion_type = promotion_type.id_promotion_type'); //query to get promotions and their type
                            $stm->execute();
                            $row = $stm->fetchAll();
                            foreach ($row as $value) {
                                echo '<option value=' . "$value[0]" . '>' . $value[1] . ' - ' . $value[2] . '</option>';
                            }
                            ?>
                        </select>
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
                    <input type="submit" class="btn-primary btn Medium" id="logbtn" value="NEW OFFER">
                </div>


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
                    <input type="submit" class="btn-primary btn Medium" id="dlogbtn" value="DELETE OFFER">
                </div>

                <!-- OFFER MODIFICATION -->
                <div class="mantitl">
                    <h1 class="big titl">OFFER MODIFICATION</h1>
                </div>
                <div class="col-sm-6 divg">
                    <div class="orga">
                        <label for="mnametbx" class="tbxindicator small">Enter the name of the offer to be deleted</label>
                        <input type="text" class="form-control tbx medium" id="mnametbx" placeholder="WEB IT Internship"> <!-- name field -->
                    </div>
                </div>
                <div class="col-sm-6 row divd">
                    <div class="orga">
                        <label for="mcompanytbx" class="tbxindicator small">Enter the company name</label>
                        <input type="text" class="form-control tbx medium" id="mcompanytbx" placeholder="VTM Incorporated"> <!-- skills field -->
                    </div>
                </div>
                <div>
                    <!--Ci-dessous le bouton submit-->
                    <input type="submit" class="btn-primary btn Medium" id="mlogbtn" value="MODIFY OFFER">
                </div>
            </div>
        </div>
    </form>
    <?php
    include "../php/footer.php"
    ?>
</body>

</html>