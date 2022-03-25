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
        include "../php/navbar.php"
        ?>
    </header>
    <div class="d-flex align-items-center justify-content-center madiv ">
        <div class="mainbox row">
            <!-- this is the white box -->
            <h1 class="big titl">USER CREATION</h1>
            <div class="col-sm-6 divg">
                <div class="orga">
                    <label for="mailtbx" class="tbxindicator small">Email</label>
                    <input type="email" class="form-control tbx medium" id="mailtbx" placeholder="mail@example.com"> <!-- e-mail field -->
                </div>
                <div class="orga">
                    <label for="passtbx" class="tbxindicator small">Password</label>
                    <input type="password" class="form-control tbx medium" id="passtbx" placeholder="••••••••••"> <!-- password field -->
                </div>
                <div class="orga">
                    <label for="passtbx_rep" class="tbxindicator small">Password (repeat)</label>
                    <input type="password" class="form-control tbx medium" id="passtbx_rep" placeholder="••••••••••"> <!-- password repeat field -->
                </div>
                <div class="orga">
                    <label class="custom-file-label tbxindicator">Profile picture</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input fil1" id="customFile">
                        <label class="custom-file-label filelabel medium" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="orga">
                    <label for="campustbx" class="tbxindicator small">Campus</label> <!-- Campus field -->
                    <select class="form-control tbx medium" name="campus" id="campustbx">
                        <option value="sel_rou" selected>Rouen</option>
                        <option value="sel_cae">Caen</option>
                        <option value="sel-nan">Nanterre</option>
                    </select>
                </div>


            </div>
            <div class="col-sm-6 row divd">
                <div class="orga">
                    <label for="lastnametbx" class="tbxindicator small">Lastname</label>
                    <input type="text" class="form-control tbx medium" id="lastnametbx" placeholder="John"> <!-- name field -->
                </div>
                <div class="orga">
                    <label for="firstnametbx" class="tbxindicator small">Firstname</label>
                    <input type="text" class="form-control tbx medium" id="firstnametbx" placeholder="Doe"> <!-- surname  field -->
                </div>
                <div class="col-sm-7 orga3">
                    <div class="birthday">
                        <!-- date of birth field -->
                        <label for="birthtbx" class="tbxindicator small">Birthday</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input placeholder="Select date" type="date" id="birthtbx" class="form-control tbx medium">
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 orga3">
                    <div class="gender">

                        <!-- gender field -->
                        <label for="gendertbx" class="tbxindicator small">Gender</label>
                        <select class="form-control tbx medium" name="gender" id="gendertbx">
                            <option value="gen_male" selected>Male</option>
                            <option value="gen-female">Female</option>
                            <option value="gen-other">Other</option>
                        </select>
                    </div>

                </div>
                <div class="orga">
                    <label for="roletbx" class="tbxindicator small">Role</label> <!-- promotion field -->
                    <select class="form-control tbx medium" name="role" id="roletbx">
                        <option value="sel-A1" selected>Student</option>
                        <option value="sel-A2GEN">Delegate</option>
                        <option value="sel-A2BTP">Pilot</option>
                        <option value="sel-A2S3E">Admin</option>
                    </select>
                </div>

                <div class="orga">
                    <label for="promotbx" class="tbxindicator small">Promotion</label> <!-- promotion field -->
                    <select class="form-control tbx medium" name="promo" id="promotbx">
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
                <input type="submit" class="btn-primary btn Medium" id="logbtn" value="NEW ACCOUNT">
            </div>
        </div>
    </div>
    <?php
    include "../php/footer.php"
    ?>
</body>
</html>