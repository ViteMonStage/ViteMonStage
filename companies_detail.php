<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Company detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/companies_details.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <!-- Nav bar-->
    <header>
        <?php
        include "./php/navbar.php";
        include_once "./php/companie_details.php";
        ?>
    </header>
    <?php include_once dirname(__FILE__) . "/php/companie.php";displayCompaniedetails(); ?>

    <div class="company_btn">
        <input type="button" class="small btn company" value="Invisible">
        <input type="button" class="small btn company" value="Modify">
        <input type="button" class="small btn company" value="Delete">
    </div>
    <div class="evaluate">
        <h3 class="medium evaluate_title">Evaluate the company </h3>
        <div class="evaluate_criteria">
            <p class="criteria mini">Working environnement : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="evaluate_criteria">
            <p class="criteria mini">Working conditions : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="evaluate_criteria">
            <p class="criteria mini">Wage : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="evaluate_criteria">
            <p class="criteria mini">Acquired experience : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="evaluate_criteria">
            <p class="criteria mini">Supervision quality : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <input type="button" class="small btn submit" value="Submit">
    </div>


    <div class="profile_results row">
        <h3 class="medium results_title">Evaluations</h3>
        <div class="profile col-md-8">
            <div class="avatar">
                <img src="./assets/pictures/avatar.jpg" alt="Avatar" class="avatar_size">
            </div>
            <div class="avatar_desc">
                <h3 class="medium">Paul</h3>
                <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            </div>
        </div>
        <div class="results col-md-3">
            <div class="results_criteria">
                <p class="criteria mini">Working environnement : </p>
                <div class="results_rate">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
            <div class="results_criteria">
                <p class="criteria mini">Working conditions : </p>
                <div class="results_rate">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
            <div class="results_criteria">
                <p class="criteria mini">Wage : </p>
                <div class="results_rate">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
            <div class="results_criteria">
                <p class="criteria mini">Acquired experience : </p>
                <div class="results_rate">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
            <div class="results_criteria">
                <p class="criteria mini">Supervision quality : </p>
                <div class="results_rate">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "./php/footer.php"
    ?>

</body>