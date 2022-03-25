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
            <div class="mantitl">

                            <!--USER CREATION-->
                <h1 class="big titl">USER CREATION</h1>
            </div>
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
                        <label class="custom-file-label filelabel medium" for="customFile">Choose file</label> <!-- Profile picture field -->
                    </div>
                </div>
                <div class="orga">
                    <label for="campustbx" class="tbxindicator small">Campus</label> <!-- Campus field -->
                    <select class="form-control tbx medium" name="campus" id="campustbx">
                        <option selected>Rouen</option>
                        <option>Caen</option>
                        <option>Nanterre</option>
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
                <div class="orga2">
                    <div class="col-sm-7 orga3">
                        <!-- date of birth field -->
                        <label for="birthtbx" class="tbxindicator small">Birthday</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input placeholder="Select date" type="date" id="birthtbx" class="form-control tbx medium">
                        </div>
                    </div>
                    <div class="col-sm-5 orga3">

                        <!-- gender field -->
                        <label for="gendertbx" class="tbxindicator small">Gender</label>
                        <select class="form-control tbx medium" name="gender" id="gendertbx">
                            <option selected>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="orga">
                    <label for="roletbx" class="tbxindicator small">Role</label> <!-- promotion field -->
                    <select class="form-control tbx medium" name="role" id="roletbx">
                        <option selected>Student</option>
                        <option>Delegate</option>
                        <option>Pilot</option>
                        <option>Admin</option>
                    </select>
                </div>
                <div class="orga">
                    <label for="promotbx" class="tbxindicator small">Promotion</label> <!-- promotion field -->
                    <select class="form-control tbx medium" name="promo" id="promotbx">
                        <option selected>A1</option>
                        <option>A2 INFO</option>
                        <option>A2 GENERALISTE</option>
                        <option>A2 BTP</option>
                        <option>A2 S3E</option>
                    </select>
                </div>
            </div>
            <div>
                <!--Ci-dessous le bouton submit-->
                <input type="submit" class="btn-primary btn Medium" id="logbtn" value="NEW ACCOUNT">
            </div>




                <!--USER DELETION-->
            <div class="mantitl">
                <h1 class="big titl">USER DELETION</h1>
            </div>
            <div class="col-sm-6 orga">
                <label for="maildtbx" class="tbxindicator small">Enter the email of the user to be deleted</label>
                <input type="email" class="form-control tbx medium" id="maildtbx" placeholder="mail@example.com"> <!-- e-mail field -->
            </div>
            <div>
                <!--Ci-dessous le bouton delete-->
                <input type="submit" class="btn-primary btn Medium" id="logbtn" value="DELETE ACCOUNT">
            </div>


                <!--USER MODIFICATION FIELD-->
            <div class="mantitl">
                <h1 class="big titl">USER MODIFICATION</h1>
            </div>
            <div class="col-sm-6 divg">
                <div class="orga">
                    <label for="mmailtbx" class="tbxindicator small">Email</label>
                    <input type="email" class="form-control tbx medium" id="mmailtbx" placeholder="mail@example.com"> <!-- e-mail field -->
                </div>
                <div class="orga">
                    <label for="mpasstbx" class="tbxindicator small">Password</label>
                    <input type="password" class="form-control tbx medium" id="mpasstbx" placeholder="••••••••••"> <!-- password field -->
                </div>
                <div class="orga">
                    <label for="mpasstbx_rep" class="tbxindicator small">Password (repeat)</label>
                    <input type="password" class="form-control tbx medium" id="mpasstbx_rep" placeholder="••••••••••"> <!-- password repeat field -->
                </div>
                <div class="orga">
                    <label class="custom-file-label tbxindicator">Profile picture</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input fil1" id="mcustomFile">
                        <label class="custom-file-label filelabel medium" for="mcustomFile">Choose file</label> <!-- Profile picture field -->
                    </div>
                </div>
                <div class="orga">
                    <label for="mcampustbx" class="tbxindicator small">Campus</label> <!-- Campus field -->
                    <select class="form-control tbx medium" name="campus" id="mcampustbx">
                        <option selected>Rouen</option>
                        <option>Caen</option>
                        <option>Nanterre</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 row divd">
                <div class="orga">
                    <label for="mlastnametbx" class="tbxindicator small">Lastname</label>
                    <input type="text" class="form-control tbx medium" id="mlastnametbx" placeholder="John"> <!-- name field -->
                </div>
                <div class="orga">
                    <label for="mfirstnametbx" class="tbxindicator small">Firstname</label>
                    <input type="text" class="form-control tbx medium" id="mfirstnametbx" placeholder="Doe"> <!-- surname  field -->
                </div>
                <div class="orga2">
                    <div class="col-sm-7 orga3">
                        <!-- date of birth field -->
                        <label for="mbirthtbx" class="tbxindicator small">Birthday</label>
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input placeholder="Select date" type="date" id="mbirthtbx" class="form-control tbx medium">
                        </div>
                    </div>
                    <div class="col-sm-5 orga3">

                        <!-- gender field -->
                        <label for="mgendertbx" class="tbxindicator small">Gender</label>
                        <select class="form-control tbx medium" name="gender" id="mgendertbx">
                            <option selected>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="orga">
                    <label for="mroletbx" class="tbxindicator small">Role</label> <!-- promotion field -->
                    <select class="form-control tbx medium" name="role" id="mroletbx">
                        <option selected>Student</option>
                        <option>Delegate</option>
                        <option>Pilot</option>
                        <option>Admin</option>
                    </select>
                </div>
                <div class="orga">
                    <label for="mpromotbx" class="tbxindicator small">Promotion</label> <!-- promotion field -->
                    <select class="form-control tbx medium" name="promo" id="mpromotbx">
                        <option selected>A1</option>
                        <option>A2 INFO</option>
                        <option>A2 GENERALISTE</option>
                        <option>A2 BTP</option>
                        <option>A2 S3E</option>
                    </select>
                </div>
            </div>
            <div>
                <!--Ci-dessous le bouton submit-->
                <input type="submit" class="btn-primary btn Medium" id="modbtn" value="MODIFY ACCOUNT">
            </div>
        </div>
    </div>
    <?php
    include "../php/footer.php"
    ?>
</body>

</html>