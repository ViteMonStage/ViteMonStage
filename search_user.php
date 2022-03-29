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
    <!--  Navbar -->
    <?php
    include "./php/db.php"; //Used to get global pdo
    include "./php/search_user_sql.php";
    include "./php/navbar.php";
    ?>
    <!-- User serch bar -->
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card p-3 py-4">
                    <h5>Search a User</h5>
                    <form action="search_user.php" method="post">
                    <div class="row g-3 mt-2">
                        <div class="col-md-2">
                            <select class="form-select frm-slc" aria-label="Default select example" name="Status">
                                <option class="frm-slc" value="1" selected>Anyone</option>
                                <option class="frm-slc" value="2">Student</option>
                                <option class="frm-slc" value="3">Delegate</option>
                                <option class="frm-slc" value="4">Pilot</option>
                                <option class="frm-slc" value="5">Administrator</option>
                                <option class="frm-slc" value="6">Company Representative<?php  ?></option>
                            </select>
                        </div>
                        <div class="col-md-8"> <input type="text" name="search_user" class="form-control" placeholder="Search for someone"><?php echo"$search_user"?> </div>
                        <div class="col-md-2"> <button type="submit" name="submit" class="btn btn-secondary btn-block floatTop" value="submit">Search Results</button> </div> </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Résults -->
    <div class="container">
        <div class="row ng-scope">
            <div class="col-md-10 offset-md-1">
            <p class="search-results-count small"><?php echo(count_user()) ?></p>    

            <?php include_once dirname(__FILE__) . "/php/search_user_sql.php";displayUser(); ?>
                <!--section class="search-result-item">
                    <a class="image-link" href="#"><img class="image" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                    </a>
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="search-result-item-heading"><a href="#">Florian SAVALLE</a></h4>
                                <p class="info">Student</p>
                                <p class="description"> description</p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <a class="col-sm-10 btn btn-secondary" href="#">See profile</a>
                                <a class="col-sm-10 btn btn-secondary" href="#">Manage rights</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="search-result-item">
                    <a class="image-link" href="#"><img class="image" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                    </a>
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="search-result-item-heading"><a href="#">$value</a></h4>
                                <p class="info">Student</p>
                                <p class="description"> description</p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <a class="col-sm-10 btn btn-secondary " href="#">See profile</a>
                                <a class="col-sm-10 btn btn-secondary" href="#">Manage rights</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="search-result-item">
                    <a class="image-link" href="#"><img class="image" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                    </a>
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="search-result-item-heading"><a href="#">Pierre LEJEUNE</a></h4>
                                <p class="info">Delegate</p>
                                <p class="description"> description</p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <a class="col-sm-10 btn btn-secondary" href="#">See profile</a>
                                <a class="col-sm-10 btn btn-secondary" href="#">Manage rights</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="search-result-item">
                    <a class="image-link" href="#"><img class="image" src="https://bootdey.com/img/Content/avatar/avatar4.png">
                    </a>
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="search-result-item-heading"><a href="#">Paul DESPONT</a></h4>
                                <p class="info">Student</p>
                                <p class="description"> description</p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <a class="col-sm-10 btn btn-secondary" href="#">See profile</a>
                                <a class="col-sm-10 btn btn-secondary" href="#">Manage rights</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="search-result-item">
                    <a class="image-link" href="#"><img class="image" src="https://bootdey.com/img/Content/avatar/avatar5.png">
                    </a>
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="search-result-item-heading"><a href="#">Tom ANTOINE</a></h4>
                                <p class="info">Student</p>
                                <p class="description"> description</p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <a class="col-sm-10 btn btn-secondary" href="#">See profile</a>
                                <a class="col-sm-10 btn btn-secondary" href="#">Manage rights</a>
                            </div>
                        </div>
                    </div>
                </section-->
                
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    include "./php/footer.php"
    ?>
</body>

</html>