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
    <h1 class="maxi title">Your wishlist ! </h1>
    <div class="wish">
        <div class="image">
            <img src="./assets/pictures/logo4.png" alt="Logo 1" class="logoentreprise">
        </div>
        <div class="company_desc">
            <h3 class="medium">Name of the company</h3>
            <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
            <h4 class="mini">Confiance des pilotes : 8.7/10</h4>
        </div>
    </div>

    <?php
    include "./php/footer.php"
    ?>
</body>