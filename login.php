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
    <form action="/php/login.php" method="POST">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="mainbox">
                <h1 class="maxi">SIGN IN</h1>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "1") {
                        echo '<p class="small erreur">Wrong e-mail or password, try again.</p>';
                    }if ($_GET["error"] == "2") {
                        echo '<p class="small erreur">Please, fill all fields.</p>';
                    }
                }
                ?>
                <label for="mailtbx" class="tbxindicator small">Email</label>
                <input type="name" class="form-control tbx medium" id="mailtbx" name="email" placeholder="mail@example.com">
                <label for="passtbx" class="tbxindicator small">Password</label>
                <input type="password" class="form-control tbx medium" id="passtbx" name="password" placeholder="••••••••••">
                <!--Ci-dessous le bouton login-->
                <input type="submit" class="btn-primary btn big" id="submit" value="LOGIN">
            </div>
        </div>
    </form>
</body>

</html>