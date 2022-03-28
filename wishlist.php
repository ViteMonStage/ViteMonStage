<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Companies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/wishlist.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <!-- Nav bar-->
    <header>
        <?php
        include "./php/navbar.php"
        ?>
    </header>
    <div class="container">
        <img src="./assets/pictures/wishlist.jpg" class="img-fluid image" alt="Responsive image">
        <div class="centered">
            <h1 class="big title">Wishlist</h1>
        </div>
    </div>
    <?php
    include dirname(__FILE__) . "/php/wishlist.php";
    displayWishlist($_SESSION["id_user"]);
    ?>
    <?php
    include "./php/footer.php"
    ?>
</body>