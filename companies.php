<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Companies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/companies.scss">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

</head>

<body>
    <?php
    session_start();
    if ($_SESSION['role'] == 2 && $_SESSION['search_company'] == 0) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('./error/403.php', TRUE);
        die($contents);
    }
    ?>
    <!-- Nav bar-->
    <header>
        <?php
        include_once "./php/navbar.php";
        ?>
    </header>
    <!-- Head band-->
    <div class="container">
        <img src="./assets/pictures/bandeau.jpg" class="img-fluid image" alt="Responsive image">
        <div class="centered">
            <h1 class="big title">Companies</h1>
        </div>
    </div>
    <!-- Filtre -->
    <form action="/php/searchcompany.php" method="POST">
        <div class="row g-0 justify-content-center filt smalltitle bigtitle">
            <div class="col-lg-3 col-sm-12 colo">
                <label for="nametbx" class="tbxindicator small">Name</label>
                <input type="text" class="tbx small" id="nametbx" name="company_name">
            </div>
            <div class="col-lg-3 col-sm-12 colo">
                <label for="locationtbx" class="tbxindicator small">Location</label>
                <select class="form-control tbx small" id="nametbx" name="location">
                    <?php
                    include "../db.php"; //Used to get global pdo
                    try {
                        $stm = $pdo->prepare('SELECT cityname from company 
                                INNER JOIN  address on company.id_company = address.id_company
                                INNER JOIN city on address.id_city = city.id_city'); //prepared statement to get campuses name
                        $stm->execute();
                        $row = $stm->fetchAll();
                        echo '<option>Any Location</option>';
                        foreach ($row as $value) {
                            echo '<option>' . $value[0] . '</option>';
                        }
                    } catch (\PDOException $e) {
                        echo $e->getMessage();
                        echo "   ";
                        echo (int)$e->getCode();
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-3 col-sm-12 colo">
                <label for="sectortbx" class="tbxindicator small">Sector</label>
                <select class="form-control tbx small" id="sectortbx" name="sector_activity">
                    <?php
                    include "../db.php"; //Used to get global pdo
                    try {
                        $stm = $pdo->prepare('SELECT sector_activity from company'); //prepared statement to get campuses name
                        $stm->execute();
                        $row = $stm->fetchAll();
                        echo '<option>Any Sector</option>';
                        foreach ($row as $value) {
                            echo '<option>' . $value[0] . '</option>';
                        }
                    } catch (\PDOException $e) {
                        echo $e->getMessage();
                        echo "   ";
                        echo (int)$e->getCode();
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-3 col-sm-12 colo">
                <input value="Search" id="submit" type="submit" class="small btn search">
            </div>
        </div>
    </form>

    <h2 class="results big"> </h2>
    <!--Function allowing the dynamic display of the different companies in our database -->
    <?php include_once dirname(__FILE__) . "/php/companies.php";
    displayCompanie(); ?>
    <?php
    include "./php/footer.php"
    ?>
</body>

</html>