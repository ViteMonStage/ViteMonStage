<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>VMS | Candidatures</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
  <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./stylesheets/candidatures.scss">
  <link rel="stylesheet" href="./stylesheets/global.scss">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
  <header>
    <?php
    include "./php/navbar.php";
    include "./php/candidature.php";
    if(!isset($_GET["id_user"])){
      $id_user = $_SESSION["id_user"];
    }else{
      $id_user = $_GET["id_user"];
    }
    ?>
  </header>
  <div class="current_candidatures">
    <h1 class="big current_candidatures_title"><i class="fa-solid fa-clock"></i> Your current applications</h1>
    <div class="row g-0">
      <div class="col-lg-6 col-sm-12">
        <div class="list-group current" id="list-tab-1" role="tablist">
          <?php displayTabInProgress($id_user) ?>
        </div>
      </div>
      <div class="col-lg-6 col-sm-12">
        <div class="tab-content" id="nav-tabContent-1">
          <?php displayDescInProgress($id_user) ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-lg-6 col-sm-12">
      <div class="accepted_candidatures">
        <h1 class="big accepted_candidatures_title"><i class="fa-solid fa-circle-check"></i> Your accepted applications</h1>
        <div class="row g-0">
          <div class="col-lg-6 col-sm-12">
            <div class="list-group accepted" id="list-tab-2" role="tablist">
              <?php displayTabAccepted($id_user) ?>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <?php displayDescInAccepted($id_user) ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="refused_candidatures">
        <h1 class="big refused_candidatures_title"><i class="fa-solid fa-circle-xmark"></i> Your refused applications</h1>
        <div class="row g-0">
          <div class="col-lg-6 col-sm-12">
            <div class="list-group refused" id="list-tab-3" role="tablist">
              <?php displayTabRefused($id_user) ?>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
          <?php displayDescInRefused($id_user) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php
  include "./php/footer.php"
  ?>
</body>

</html>