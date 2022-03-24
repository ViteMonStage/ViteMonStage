<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Companies</title>
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
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand maxi logo" href="./index.php">VMS</a>
            <button class="navbar-toggler pad" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav navbar-align-left navbar-margin">
                    <a class="nav-item nav-link small" href="./index.php"><i class="fa-solid fa-house"></i> HOME</a>
                    <a class="nav-item nav-link small" href="./offers.php"><i class="fa-solid fa-list"></i> OFFERS</a>
                    <a class="nav-item nav-link small" href="./candidatures.php"><i class="fa-solid fa-circle-info"></i> CANDIDATURES</a>
                    <a class="nav-item nav-link small current" href="./companies.php"><i class="fa-solid fa-building"></i> COMPANIES</a>
                    <a class="nav-item nav-link small navbar-highlight" href="./profile_user.php"><i class="fa-solid fa-user"></i> PROFILE</a>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle small admin-list" href="#" data-bs-toggle="dropdown" id="admin-list"><i class="fa-solid fa-gear"></i> ADMINISTRATION</a>
                        <div class="dropdown-menu dropdown-menu-end admin-list">
                            <a href="#" class="dropdown-item admin-list">Manage company</a>
                            <a href="#" class="dropdown-item admin-list">Manage offer</a>
                            <a href="#" class="dropdown-item admin-list">Manage user</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Search user</a>
                        </div>
                    </li>
                    <a class="nav-item nav-link small" href="#"><i class="fa-solid fa-bell"></i><span class="show-small hide-big notification"> NOTIFICATIONS</span> <span id="notifAmount" class="badge rounded-pill bg-danger">0</span></a>
                </div>
            </div>
        </nav>
    </header>
    <div class="company">
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
    <div class="company_btn">
        <a role="button" href="./companies_detail.php" class="small btn company">Postulate</a>
        <input type="button" class="small btn company" value="Invisible">
        <input type="button" class="small btn company" value="Modify">
        <input type="button" class="small btn company" value="Delete">
    </div>
    <div class="evaluate">
        <h3 class="medium evaluation">Evaluate the company </h3>
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
    <div class="company">
        <div class="image">
            <img src=".\assets\pictures\bg.jpg" alt="Logo 1" class="logoentreprise">
        </div>
        <div class="company_desc">
            <h3 class="medium">Name of the company</h3>
            <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
            <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
            <h4 class="mini">Confiance des pilotes : 8.7/10</h4>
        </div>
    </div>
    <div class="profile">

    </div>
    <div class="results">
        <h3 class="medium results_title">Evaluations</h3>
        <div class="results_criteria">
            <p class="criteria mini">Working environnement : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="results_criteria">
            <p class="criteria mini">Working conditions : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="results_criteria">
            <p class="criteria mini">Wage : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="results_criteria">
            <p class="criteria mini">Acquired experience : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="results_criteria">
            <p class="criteria mini">Supervision quality : </p>
            <div class="rate">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
    </div>
    <?php
    include "./php/footer.php"
    ?>

</body>