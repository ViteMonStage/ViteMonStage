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
        <img src="./assets/pictures/bandeau.jpg" class="img-fluid image" alt="Responsive image">
        <div class="centered">
            <h1 class="big title">Wishlist</h1>
        </div>
    </div>

    <div class="result">
        <img src="./assets/pictures/logo.jpg" alt="Logo 1" class="logoentreprise">
        <div class="in_desc">
            <h3 class="medium">First wish</h3>
            <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            <h4 class="mini loca">Evreux (27000) - Publication 04/05/2022 - IT</h4>
        </div>
      
    </div>

    <div class="result">
        <img src="./assets/pictures/logo2.jpg" alt="Logo 2" class="logoentreprise">
        <div class="in_desc">
            <h3 class="medium">Second wish</h3>
            <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            <h4 class="mini loca">Evreux (27000) - Publication 04/05/2022 - IT</h4>
        </div>
    </div>


    <?php
    include "./php/footer.php"
    ?>
</body>