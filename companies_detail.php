<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Company detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./js/companies_detail.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/companies_details.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <!-- Nav bar-->
    <header>
        <?php
        ob_start();
        include_once "./php/companies_detail.php";
        companyExists();
        include "./php/navbar.php";
        ?>
    </header>
    <?php
    ob_start();
    displayCompaniedetails();?>
    <form class="company_btn" action="./php/visible.php" method="POST"> 
        <input type="button" class="small btn company" value="Invisible" name="invisible">
    </form>
    <?php include_once dirname(__FILE__) . "/php/companies.php";
    displayRatingOptions($_SESSION["id_user"],$_GET["id_company"]); 
    displayAllRating($_GET["id_company"]);
    ?>


    <?php
    include "./php/footer.php"
    ?>

</body>