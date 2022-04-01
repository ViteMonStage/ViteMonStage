<!DOCTYPE html>
<html lang="fr">
<!--  Head -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for a user</title>
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="./stylesheets/search_user.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<!--  Body -->

<body>
<?php session_start();
    if ($_SESSION['role'] == 1) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('./error/403.php', TRUE);
        die($contents);
    }
        ?>
    }
    <!--  Navbar -->
    <?php
    include "./php/db.php"; //Used to get global pdo
    include "./php/search_user_sql.php";
    include "./php/navbar.php";
    ?>
    <!-- User serch bar -->
    <form action="php/search_user_sql.php" method="post">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card p-3 py-4">
                    <h5>Search a User</h5>
                    <div class="row g-3 mt-2">
                        <div class="col-md-2">
                            <select class="form-select frm-slc" aria-label="Default select example" name="Status">
                                <option class="frm-slc" value="0" selected>Anyone</option>
                                <option class="frm-slc" value="1">Student</option>
                                <option class="frm-slc" value="2">Delegate</option>
                                <option class="frm-slc" value="3">Pilot</option>
                                <option class="frm-slc" value="4">Administrator</option>
                                <option class="frm-slc" value="5">Company Representative<?php  ?></option>
                            </select>
                        </div>
                        <div class="col-md-8"> <input type="text" name="search_user" class="form-control" placeholder="<?php if(isset($_GET['usersearch'])){echo $_GET['usersearch'];} ?>"> </div>
                        <div class="col-md-2"> <button type="submit" name="submit" class="btn btn-secondary btn-block floatTop" value="submit">Search Results</button> </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!--  Résults -->
    <div class="container">
        <div class="row ng-scope">
            <div class="col-md-10 offset-md-1">
            <?php displayUser() ?>

            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    include "./php/footer.php"
    ?>
</body>

</html>