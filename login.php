<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/login.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="mainbox">
            <h1 class="maxi">SIGN IN</h1>
            <label for="mailtbx" class="tbxindicator small">Email</label>
            <input type="email" class="form-control tbx medium" id="mailtbx" placeholder="mail@example.com">
            <label for="passtbx" class="tbxindicator small">Password</label>
            <input type="password" class="form-control tbx medium" id="passtbx" placeholder="••••••••••">
            <!--Ci-dessous le bouton login-->
            <input type="submit" class="btn-primary btn big" id="logbtn" value="LOGIN">
            <br>
            <div class="margin">
                <a href="signup.php" class="linkl">No account ? Sign up !</a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>