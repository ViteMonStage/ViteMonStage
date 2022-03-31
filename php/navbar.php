<?php
include dirname(__FILE__) . "/login_check.php"; //import login_check.php file to check if user is logged in. If not : redirects immediately in login page
include dirname(__FILE__) . "/notification.php";
?>
<script src="/js/notification.js"></script>
<nav class="navbar navbar-expand-lg navbar-light">
    <!-- Navbar that will be displayed in each regular page -->
    <a class="navbar-brand maxi logo" href="/index.php">VMS</a>
    <button class="navbar-toggler pad" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" id="toggler">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav navbar-align-left navbar-margin">
            <a class="nav-item nav-link small" href="/index.php" id="navbar-index-btn"><i class="fa-solid fa-house"></i> HOME</a>
            <a class="nav-item nav-link small" href="/offers.php" id="navbar-offers-btn"><i class="fa-solid fa-list"></i> OFFERS</a>
            <a class="nav-item nav-link small" href="/candidatures.php" id="navbar-candidatures-btn"><i class="fa-solid fa-circle-info"></i> CANDIDATURES</a>
            <a class="nav-item nav-link small" href="/companies.php" id="navbar-companies-btn"><i class="fa-solid fa-building"></i> COMPANIES</a>
            <a class="nav-item nav-link small navbar-highlight" href="/profile_user.php" id="navbar-profile-btn"><i class="fa-solid fa-user"></i> PROFILE</a>
            <a class="nav-item nav-link small navbar-highlight-logout" href="/php/disconnect.php" id="navbar-logout-btn"><i class="fa-solid fa-lock"></i> LOG OUT</a>
            <?php if($_SESSION["role"] == 4 || $_SESSION["role"] == 3):?>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle small admin-list" href="#" data-bs-toggle="dropdown" id="navbar-admin-btn"><i class="fa-solid fa-gear" aria-expanded="false"></i> ADMINISTRATION</a>
                <div class="dropdown-menu dropdown-menu-end admin-list">
                    <a href="/management/companies.php" class="dropdown-item admin-list">Manage companies</a>
                    <a href="/management/offers.php" class="dropdown-item admin-list">Manage offers</a>
                    <a href="/management/users.php" class="dropdown-item admin-list">Manage users</a>
                    <div class="dropdown-divider"></div>
                    <a href="/search_user.php?Status=0&usersearch=" class="dropdown-item admin-list">Search users</a>
                </div>
            </li>
            <?php endif;?>
            <a class="nav-item nav-link small" href="#" role="button" id="navbar-notif-btn" data-bs-toggle="modal" data-bs-target="#notification-modal" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-bell"></i><span class="show-small hide-big notification"> NOTIFICATIONS</span> <span id="notifAmount" class="badge rounded-pill bg-danger"><?php echo getNumberNotification($_SESSION['id_user']) ?></span></a>
        </div>
    </div>
</nav>
<div class="modal fade" id="notification-modal" tabindex="-1" aria-labelledby="notification-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="notification-modal">Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php displayNotification($_SESSION['id_user']);?>
            <div class="modal-footer">
                <button type="button" class="btn-notification small" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn-notification small markallasread" data-bs-dismiss="modal">Mark all as read</button>
            </div>
        </div>
    </div>
</div>