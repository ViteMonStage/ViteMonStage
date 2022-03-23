<script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
<script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/stylesheets/global.scss">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand maxi logo" href="/index.php">VMS</a>
    <button class="navbar-toggler pad" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav navbar-align-left navbar-margin">
            <a class="nav-item nav-link small" href="/index.php" id="navbar-index-btn"><i class="fa-solid fa-house"></i> HOME</a>
            <a class="nav-item nav-link small" href="/offers.php" id="navbar-offers-btn"><i class="fa-solid fa-list"></i> OFFERS</a>
            <a class="nav-item nav-link small" href="/candidatures.php" id="navbar-candidatures-btn"><i class="fa-solid fa-circle-info"></i> CANDIDATURES</a>
            <a class="nav-item nav-link small" href="/companies.php" id="navbar-companies-btn"><i class="fa-solid fa-building"></i> COMPANIES</a>
            <a class="nav-item nav-link small navbar-highlight" href="/profile_user.php" id="navbar-profile-btn"><i class="fa-solid fa-user"></i> PROFILE</a>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle small admin-list" href="#" data-bs-toggle="dropdown" id="navbar-admin-btn"><i class="fa-solid fa-gear" aria-expanded="false"></i> ADMINISTRATION</a>
                <div class="dropdown-menu dropdown-menu-end admin-list">
                    <a href="/management/companies.php" class="dropdown-item admin-list">Manage companies</a>
                    <a href="/management/offers.php" class="dropdown-item admin-list">Manage offers</a>
                    <a href="/management/users.php" class="dropdown-item admin-list">Manage users</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">Search users</a>
                </div>
            </li>
            <a class="nav-item nav-link small" href="#"><i class="fa-solid fa-bell"></i><span class="show-small hide-big notification"> NOTIFICATIONS</span> <span id="notifAmount" class="badge rounded-pill bg-danger">0</span></a>
        </div>
    </div>
</nav>