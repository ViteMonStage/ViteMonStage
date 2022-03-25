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
        include "../php/navbar.php"
        ?>
    </header>
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
                    <input type="text" class="form-control tbx medium" id="nametbx" placeholder="WEB IT Internship"> <!-- name field -->
                </div>
                <div class="orga4">
                    <label for="desctbx" class="tbxindicator small">Description</label>
                    <textarea class="form-control ltbx medium" id="desctbx" placeholder="Lorem ipsum dolor sit amet. Qui consequatur doloribus quo alias repudiandae eos labore tempora. Et aspernatur ullam quo sequi illum aut rerum voluptates sed reprehenderit labore et quam maxime aut accusantium exercitationem qui quasi distinctio. Eos dignissimos eius et officia saepe eos suscipit esse et inventore quia ex commodi accusamus et reprehenderit sunt eos soluta aspernatur."></textarea> <!-- description field -->
                </div>
                <div class="orga">
                    <label for="comptbx" class="tbxindicator small">Company</label>
                    <select class="form-control tbx medium" name="company" id="comptbx">
                        <option selected>VTS Incorporated</option> <!-- company field -->
                        <option>COMPANY 1</option>
                        <option>COMPANY 2</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 row divd">
                <div class="orga">
                    <label for="skilltbx" class="tbxindicator small">Skills</label>
                    <input type="text" class="form-control tbx medium" id="skilltbx" placeholder="Databases, HTML, CSS, PHP"> <!-- skills field -->
                </div>
                <div class="orga">
                    <label for="salartbx" class="tbxindicator small">Estimated salary (per month)</label>
                    <input type="text" class="form-control tbx medium" id="salartbx" placeholder="650€"> <!-- salary  field -->
                </div>
                <div class="orga2">
                    <div class="col-sm-7 orga3">
                        <!-- starting date field -->
                        <label for="starttbx" class="tbxindicator small">Starting date</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input type="date" id="starttbx" class="form-control tbx medium">
                        </div>
                    </div>
                    <div class="col-sm-5 orga3">
                        <!-- ending date field -->
                        <label for="endtbx" class="tbxindicator small">Ending date</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input type="date" id="endtbx" class="form-control tbx medium">
                        </div>
                    </div>
                </div>
                <div class="orga">
                    <label for="nbrtbx" class="tbxindicator small">Number of Interns</label>
                    <input type="number" class="form-control tbx medium" id="nbrtbx" placeholder="1"> <!-- number of interns field -->
                </div>
            </div>
            <label class="tbxindicator Medium promotex">Promotions concerned</label>
            <div class="orga5">
                <!-- Promotions concerned field -->
                <div class="checkb">
                    <input type="checkbox" class="medium" id="promtbx1">
                    <label for="promtbx1" class="tbxindicator mini">CPIA1</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="promtbx2">
                    <label for="promtbx2" class="tbxindicator mini">CPIA2 INFO</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="promtbx3">
                    <label for="promtbx3" class="tbxindicator mini">CPIA2 GEN</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="promtbx4">
                    <label for="promtbx4" class="tbxindicator mini">CPIA2 S3E</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="promtbx5">
                    <label for="promtbx5" class="tbxindicator mini">CPIA2 BTP</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="promtbx6">
                    <label for="promtbx6" class="tbxindicator mini">CPIA3</label>
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
                    <input type="text" class="form-control tbx medium" id="dnametbx" placeholder="WEB IT Internship"> <!-- name field -->
                </div>
            </div>
            <div class="col-sm-6 row divd">
                <div class="orga">
                    <label for="dcompanytbx" class="tbxindicator small">Enter the company name</label>
                    <input type="text" class="form-control tbx medium" id="dcompanytbx" placeholder="VTM Incorporated"> <!-- skills field -->
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
                    <label for="mnametbx" class="tbxindicator small">Name</label>
                    <input type="text" class="form-control tbx medium" id="mnametbx" placeholder="WEB IT Internship"> <!-- name field -->
                </div>
                <div class="orga4">
                    <label for="mdesctbx" class="tbxindicator small">Description</label>
                    <textarea class="form-control ltbx medium" id="mdesctbx" placeholder="Lorem ipsum dolor sit amet. Qui consequatur doloribus quo alias repudiandae eos labore tempora. Et aspernatur ullam quo sequi illum aut rerum voluptates sed reprehenderit labore et quam maxime aut accusantium exercitationem qui quasi distinctio. Eos dignissimos eius et officia saepe eos suscipit esse et inventore quia ex commodi accusamus et reprehenderit sunt eos soluta aspernatur."></textarea> <!-- description field -->
                </div>
                <div class="orga">
                    <label for="mcomptbx" class="tbxindicator small">Company</label>
                    <select class="form-control tbx medium" name="company" id="mcomptbx">
                        <option selected>VTS Incorporated</option> <!-- company field -->
                        <option>COMPANY 1</option>
                        <option>COMPANY 2</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 row divd">
                <div class="orga">
                    <label for="mskilltbx" class="tbxindicator small">Skills</label>
                    <input type="text" class="form-control tbx medium" id="mskilltbx" placeholder="Databases, HTML, CSS, PHP"> <!-- skills field -->
                </div>
                <div class="orga">
                    <label for="msalartbx" class="tbxindicator small">Estimated salary (per month)</label>
                    <input type="text" class="form-control tbx medium" id="msalartbx" placeholder="650€"> <!-- salary  field -->
                </div>
                <div class="orga2">
                    <div class="col-sm-7 orga3">
                        <!-- starting date field -->
                        <label for="mstarttbx" class="tbxindicator small">Starting date</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input type="date" id="mstarttbx" class="form-control tbx medium">
                        </div>
                    </div>
                    <div class="col-sm-5 orga3">
                        <!-- ending date field -->
                        <label for="mendtbx" class="tbxindicator small">Ending date</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input type="date" id="mendtbx" class="form-control tbx medium">
                        </div>
                    </div>
                </div>
                <div class="orga">
                    <label for="mnbrtbx" class="tbxindicator small">Number of Interns</label>
                    <input type="number" class="form-control tbx medium" id="mnbrtbx" placeholder="1"> <!-- number of interns field -->
                </div>
            </div>
            <label class="tbxindicator Medium promotex">Promotions concerned</label>
            <div class="orga5">
                <!-- Promotions concerned field -->
                <div class="checkb">
                    <input type="checkbox" class="medium" id="dpromtbx1">
                    <label for="promtbx1" class="tbxindicator mini">CPIA1</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="dpromtbx2">
                    <label for="promtbx2" class="tbxindicator mini">CPIA2 INFO</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="dpromtbx3">
                    <label for="promtbx3" class="tbxindicator mini">CPIA2 GEN</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="dpromtbx4">
                    <label for="promtbx4" class="tbxindicator mini">CPIA2 S3E</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="dpromtbx5">
                    <label for="promtbx5" class="tbxindicator mini">CPIA2 BTP</label>
                </div>
                <div class="checkb">
                    <input type="checkbox" class="medium" id="dpromtbx6">
                    <label for="promtbx6" class="tbxindicator mini">CPIA3</label>
                </div>
            </div>
            <div>
                <!--Ci-dessous le bouton submit-->
                <input type="submit" class="btn-primary btn Medium" id="mlogbtn" value="MODIFY OFFER">
            </div>
        </div>
    </div>
    <?php
    include "../php/footer.php"
    ?>
</body>

</html>