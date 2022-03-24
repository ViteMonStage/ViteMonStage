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

<body>
    <header>
        <?php
        include "../phpscripts/navbar.php"
        ?>
    </header>
    <div class="d-flex align-items-center justify-content-center madiv ">
        <div class="mainbox row">
            <!-- this is the white box -->
            <h1 class="big">USER CREATION</h1>
            <div class="col-sm-6">
                <label for="mailtbx" class="tbxindicator small">Email</label>
                <input type="email" class="form-control tbx medium" id="mailtbx" placeholder="mail@example.com"> <!-- e-mail field -->
                <label for="mailtbx" class="tbxindicator small">Password</label>
                <input type="password" class="form-control tbx medium" id="passtbx" placeholder="••••••••••"> <!-- password field -->
                <label for="mailtbx" class="tbxindicator small">Password (repeat)</label>
                <input type="password" class="form-control tbx medium" id="passtbx_rep" placeholder="••••••••••"> <!-- password repeat field -->
                <label for="mailtbx" class="tbxindicator small" style="margin-top:40.91%;">Campus</label> <!-- Campus field -->
                <select class="form-control tbx medium" name="campus" id="campus">
                    <option value="sel_rou" selected>Rouen</option>
                    <option value="sel_cae">Caen</option>
                    <option value="sel-nan">Nanterre</option>
                </select>
                <label class="custom-file-label tbxindicator">Profile picture</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input fil1" id="customFile">
                    <label class="custom-file-label filelabel medium" for="customFile">Choose file</label>
                </div>


            </div>
            <div class="col-sm-6 row">
                <label for="mailtbx" class="tbxindicator small">Lastname</label>
                <input type="lastname" class="form-control tbx medium" id="lastname" placeholder="John"> <!-- name field -->
                <label for="mailtbx" class="tbxindicator small">Firstname</label>
                <input type="firstname" class="form-control tbx medium" id="firstname" placeholder="Doe"> <!-- surname  field -->
                <div class="col-sm-7">
                    <!-- date of birth field -->
                    <label for="mailtbx" class="tbxindicator small" style="margin-top:28.12%;">Birthday</label>
                    <div class="md-form md-outline input-with-post-icon datepicker">
                        <input placeholder="Select date" type="date" id="example" class="form-control tbx medium">
                    </div>
                </div>
                <div class="col-sm-5">
                    <!-- gender field -->
                    <label for="mailtbx" class="tbxindicator small" style="margin-top:40.91%;">Gender</label>
                    <select class="form-control tbx medium" name="gender" id="gender">
                        <option value="gen_male" selected>Male</option>
                        <option value="gen-female">Female</option>
                        <option value="gen-other">Other</option>
                    </select>
                </div>
                <label for="mailtbx" class="tbxindicator small" style="margin-top:40.91%;">Promotion</label> <!-- promotion field -->
                <select class="form-control tbx medium" name="promo" id="promo">
                    <option value="sel-A1" selected>A1</option>
                    <option value="sel-A2INF">A2 INFO</option>
                    <option value="sel-A2GEN">A2 GENERALISTE</option>
                    <option value="sel-A2BTP">A2 BTP</option>
                    <option value="sel-A2S3E">A2 S3E</option>
                </select> <!-- promotion field -->
            </div>
            <div>
                <!--Ci-dessous le bouton login-->
                <input type="submit" class="btn-primary btn big" id="logbtn" value="CREATE AN ACCOUNT">
            </div>
        </div>
    </div>
    <?php
    include "../phpscripts/footer.php"
    ?>

</body>


</html>