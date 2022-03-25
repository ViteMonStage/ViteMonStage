<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | User creation</title>
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
        <div class="mainbox row">
            <!-- this is the white box -->
            <h1 class="big titl">OFFER CREATION</h1>
            <div class="col-sm-6 divg">
                <div class="orga">
                    <label for="nametbx" class="tbxindicator small">Name</label>
                    <input type="text" class="form-control tbx medium" id="nametbx" placeholder="WEB IT Internship"> <!-- name field -->
                </div>
                <div class="orga4">
                    <label for="desctbx" class="tbxindicator small">Description</label>
                    <textarea type="text" class="form-control ltbx medium" id="desctbx" placeholder="Lorem ipsum dolor sit amet. Qui consequatur doloribus quo alias repudiandae eos labore tempora. Et aspernatur ullam quo sequi illum aut rerum voluptates sed reprehenderit labore et quam maxime aut accusantium exercitationem qui quasi distinctio. Eos dignissimos eius et officia saepe eos suscipit esse et inventore quia ex commodi accusamus et reprehenderit sunt eos soluta aspernatur."></textarea> <!-- description field -->
                </div>
                <div class="orga">
                    <label class="custom-file-label tbxindicator">Profile picture</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input fil1" id="customFile">
                        <label class="custom-file-label filelabel medium" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="orga">
                    <label for="mailtbx" class="tbxindicator small">Campus</label> <!-- Campus field -->
                    <select class="form-control tbx medium" name="campus" id="campus">
                        <option value="sel_rou" selected>Rouen</option>
                        <option value="sel_cae">Caen</option>
                        <option value="sel-nan">Nanterre</option>
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
                        <!-- date of birth field -->
                        <label for="starttbx" class="tbxindicator small">Starting date</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input placeholder="Select date" type="date" id="starttbx" class="form-control tbx medium">
                        </div>
                    </div>
                    <div class="col-sm-5 orga3">

                        <!-- gender field -->
                        <label for="endtbx" class="tbxindicator small">Ending date</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input placeholder="Select date" type="date" id="endtbx" class="form-control tbx medium">
                        </div>
                        </select>
                    </div>
                </div>
                <div class="orga">
                    <label for="mailtbx" class="tbxindicator small">Role</label> <!-- promotion field -->
                    <select class="form-control tbx medium" name="role" id="role">
                        <option value="sel-A1" selected>Student</option>
                        <option value="sel-A2GEN">Delegate</option>
                        <option value="sel-A2BTP">Pilot</option>
                        <option value="sel-A2S3E">Admin</option>
                    </select>
                </div>

                <div class="orga">
                    <label for="mailtbx" class="tbxindicator small">Promotion</label> <!-- promotion field -->
                    <select class="form-control tbx medium" name="promo" id="promo">
                        <option value="sel-A1" selected>A1</option>
                        <option value="sel-A2INF">A2 INFO</option>
                        <option value="sel-A2GEN">A2 GENERALISTE</option>
                        <option value="sel-A2BTP">A2 BTP</option>
                        <option value="sel-A2S3E">A2 S3E</option>
                    </select>
                </div>
            </div>
            <div>
                <!--Ci-dessous le bouton login-->
                <input type="submit" class="btn-primary btn Medium" id="logbtn" value="NEW OFFER">
            </div>
        </div>
    </div>
    <?php
    include "../php/footer.php"
    ?>
</body>

</html>