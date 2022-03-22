<!DOCTYPE html>
<html lang="fr">
    <!--  Head -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serch for a user</title>
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="./stylesheets/user_list.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
    <!--  Body -->
<body>
        <!--  Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand maxi logo" href="./index.php">VMS</a>
        <button class="navbar-toggler pad" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav navbar-align-left navbar-margin">
            <a class="nav-item nav-link current small" href="./index.php"><i class="fa-solid fa-house"></i> HOME</a>
                    <a class="nav-item nav-link small" href="./offers.php"><i class="fa-solid fa-list"></i> OFFERS</a>
                    <a class="nav-item nav-link small" href="./candidatures.php"><i class="fa-solid fa-circle-info"></i> CANDIDATURES</a>
                    <a class="nav-item nav-link small" href="./companies.php"><i class="fa-solid fa-building"></i> COMPANIES</a>
                    <a class="nav-item nav-link small navbar-highlight" href="./profile_user.php"><i class="fa-solid fa-user"></i> PROFILE</a>
                    <a class="nav-item nav-link small" href="#"><i class="fa-solid fa-bell"></i><span class="show-small hide-big notification"> NOTIFICATIONS</span> <span id="notifAmount" class="badge rounded-pill bg-danger">0</span></a>
            </div>
        </div>
    </nav>
            <!-- User serch bar -->
    <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card p-3 py-4">
                <h5>Serch a User</h5>
                <div class="row g-3 mt-2">
                    <div class="col-md-2">
                        <select class="form-select frm-slc" aria-label="Default select example">
                            <option class="frm-slc" value="1" Default>Anyone</option>
                            <option class="frm-slc" value="2">Student</option>
                            <option class="frm-slc" value="3">Pilot</option>
                        </select>
                    </div>
                    <div class="col-md-8"> <input type="text" class="form-control" placeholder="search for someone"> </div>
                    <div class="col-md-2"> <button class="btn btn-secondary btn-block">Serch Results</button> </div>
                </div>
            </div>
        </div>
    </div>
    </div>
            <!--  Résults -->
    <div class="container">
    <div class="row ng-scope">
        <div class="col-md-10 offset-md-1">
            <p class="search-results-count">About 94 700 000 (0.39 sec.) results</p>
            <section class="search-result-item">
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
                            <a class="col-sm-10 btn btn-secondary" href="#">see profile</a>
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
                            <h4 class="search-result-item-heading"><a href="#">Fabien RIBES</a></h4>
                            <p class="info">Student</p>
                            <p class="description"> description</p>
                        </div>
                        <div class="col-sm-3 text-align-center">
                            <a class="col-sm-10 btn btn-secondary " href="#">see profile</a>
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
                            <a class="col-sm-10 btn btn-secondary" href="#">see profile</a>
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
                            <a class="col-sm-10 btn btn-secondary" href="#">see profile</a>
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
                            <a class="col-sm-10 btn btn-secondary" href="#">see profile</a>
                            <a class="col-sm-10 btn btn-secondary" href="#">Manage rights</a>
                        </div>
                    </div>
                </div>
            </section>
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
               <li class="page-item"><a class="page-link" href="#">First</a></li>
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                <li class="page-item"><a class="page-link" href="#">Last (16)</a></li>
            </ul>
            </nav>
        </div>
    </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="row g-0 justify-content-center">
            <!-- "Services" part of the footer-->
            <div class="col-lg-4 col-sm-12 maxi">
                <h3 class="medium">Services</h3>
                <p class="small">Partnerships</p>
                <p class="small">Blog</p>
                <p class="small">Contacts</p>
                <p class="small">FAQ</p>
            </div>
            <!-- "About" part of the footer-->
            <div class="col-lg-4 col-sm-12">
                <h3 class="medium">About</h3>
                <p class="small">Company</p>
                <p class="small">Our team</p>
                <p class="small">Careers</p>
                <p class="small">Legal terms</p>
            </div>
            <div class="col-lg-4 col-sm-12">
                <h2 class="big">VMS</h2>
                <p class="small">The french website for internships, but in english</p>
                <div class="footer_social">
                    <i class="fa-brands fa-snapchat big" id="snapchat_icon"></i>
                    <i class="fa-brands fa-twitter big" id="twitter_icon"></i>
                    <i class="fa-brands fa-github big" id="github_icon"></i>
                    <i class="fa-brands fa-discord big" id="discord_icon"></i>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>