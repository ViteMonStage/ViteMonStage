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
    include "./phpscripts/navbar.php"
    ?>
  </header>
  <div class="current_candidatures">
    <h1 class="big current_candidatures_title"><i class="fa-solid fa-clock"></i> Your current applications</h1>
    <div class="row g-0">
      <div class="col-lg-6 col-sm-12">
        <div class="list-group current" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action small active" id="current-list-1-list" data-bs-toggle="list" href="#current-list-1" role="tab" aria-controls="current-list-1">Company example 1 - Position 1 <span id="notifAmount" class="badge bg-secondary right">In progress...</span></a>
          <a class="list-group-item list-group-item-action small" id="current-list-2-list" data-bs-toggle="list" href="#current-list-2" role="tab" aria-controls="current-list-2">Company example 2 - Position 2 <span id="notifAmount" class="badge bg-secondary right">In progress...</span></a>
          <a class="list-group-item list-group-item-action small" id="current-list-3-list" data-bs-toggle="list" href="#current-list-3" role="tab" aria-controls="current-list-3">Company example 3 - Position 3 <span id="notifAmount" class="badge bg-secondary right">In progress...</span></a>
          <a class="list-group-item list-group-item-action small" id="current-list-4-list" data-bs-toggle="list" href="#current-list-4" role="tab" aria-controls="current-list-4">Company example 4 - Position 4 <span id="notifAmount" class="badge bg-secondary right">In progress...</span></a>
        </div>
      </div>
      <div class="col-lg-6 col-sm-12">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade small active show" id="current-list-1" role="tabpanel" aria-labelledby="current-list-1-list">
            <div class="s_result">
              <div class="in_desc">
                <div>
                  <h3 class="medium off_name">First offer</h3>
                  <h4 class="small off_company">DC Incorporated</h4>
                </div>
                <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">Step 4/8</div>
                </div>
              </div>
              <div class="in_logo">
                <div>
                  <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                </div>
                <div>
                  <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade small" id="current-list-2" role="tabpanel" aria-labelledby="current-list-2-list">
            <div class="s_result">
              <div class="in_desc">
                <div>
                  <h3 class="medium off_name">Second offer</h3>
                  <h4 class="small off_company">DC Incorporated</h4>
                </div>
                <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">Step 4/8</div>
                </div>
              </div>
              <div class="in_logo">
                <div>
                  <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                </div>
                <div>
                  <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade small" id="current-list-3" role="tabpanel" aria-labelledby="current-list-3-list">
            <div class="s_result">
              <div class="in_desc">
                <div>
                  <h3 class="medium off_name">Third offer</h3>
                  <h4 class="small off_company">DC Incorporated</h4>
                </div>
                <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">Step 4/8</div>
                </div>
              </div>
              <div class="in_logo">
                <div>
                  <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                </div>
                <div>
                  <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade small" id="current-list-4" role="tabpanel" aria-labelledby="current-list-3-list">
            <div class="s_result">
              <div class="in_desc">
                <div>
                  <h3 class="medium off_name">Fourth offer</h3>
                  <h4 class="small off_company">DC Incorporated</h4>
                </div>
                <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">Step 4/8</div>
                </div>
              </div>
              <div class="in_logo">
                <div>
                  <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                </div>
                <div>
                  <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                </div>
              </div>
            </div>
          </div>
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
            <div class="list-group accepted" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action small active" id="accepted-list-1-list" data-bs-toggle="list" href="#accepted-list-1" role="tab" aria-controls="accepted-list-1">Company example 1 - Position 1 <span id="notifAmount" class="badge success right">Accepted</span></a>
              <a class="list-group-item list-group-item-action small" id="accepted-list-2-list" data-bs-toggle="list" href="#accepted-list-2" role="tab" aria-controls="accepted-list-2">Company example 2 - Position 2 <span id="notifAmount" class="badge success right">Accepted</span></a>
              <a class="list-group-item list-group-item-action small" id="accepted-list-3-list" data-bs-toggle="list" href="#accepted-list-3" role="tab" aria-controls="accepted-list-3">Company example 3 - Position 3 <span id="notifAmount" class="badge success right">Accepted</span></a>
              <a class="list-group-item list-group-item-action small" id="accepted-list-4-list" data-bs-toggle="list" href="#accepted-list-4" role="tab" aria-controls="accepted-list-4">Company example 4 - Position 4 <span id="notifAmount" class="badge success right">Accepted</span></a>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade small active show" id="accepted-list-1" role="tabpanel" aria-labelledby="list-1-list">
                <div class="s_result">
                  <div class="in_desc">
                    <div>
                      <h3 class="medium off_name">First offer</h3>
                      <h4 class="small off_company">DC Incorporated</h4>
                    </div>
                    <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                    <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Process completed</div>
                    </div>
                  </div>
                  <div class="in_logo">
                    <div>
                      <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    </div>
                    <div>
                      <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade small" id="accepted-list-2" role="tabpanel" aria-labelledby="list-2-list">
                <div class="s_result">
                  <div class="in_desc">
                    <div>
                      <h3 class="medium off_name">Second offer</h3>
                      <h4 class="small off_company">DC Incorporated</h4>
                    </div>
                    <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                    <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Process completed</div>
                    </div>
                  </div>
                  <div class="in_logo">
                    <div>
                      <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    </div>
                    <div>
                      <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade small" id="accepted-list-3" role="tabpanel" aria-labelledby="list-3-list">
                <div class="s_result">
                  <div class="in_desc">
                    <div>
                      <h3 class="medium off_name">Third offer</h3>
                      <h4 class="small off_company">DC Incorporated</h4>
                    </div>
                    <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                    <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Process completed</div>
                    </div>
                  </div>
                  <div class="in_logo">
                    <div>
                      <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    </div>
                    <div>
                      <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade small" id="accepted-list-4" role="tabpanel" aria-labelledby="list-3-list">
                <div class="s_result">
                  <div class="in_desc">
                    <div>
                      <h3 class="medium off_name">Fourth offer</h3>
                      <h4 class="small off_company">DC Incorporated</h4>
                    </div>
                    <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                    <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Process completed</div>
                    </div>
                  </div>
                  <div class="in_logo">
                    <div>
                      <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    </div>
                    <div>
                      <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="refused_candidatures">
        <h1 class="big refused_candidatures_title"><i class="fa-solid fa-circle-xmark"></i> Your refused applications</h1>
        <div class="row g-0">
          <div class="col-lg-6 col-sm-12">
            <div class="list-group refused" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action small active" id="refused-list-1-list" data-bs-toggle="list" href="#refused-list-1" role="tab" aria-controls="refused-list-1">Company example 1 - Position 1 <span id="notifAmount" class="badge refused right">Refused</span></a>
              <a class="list-group-item list-group-item-action small" id="refused-list-2-list" data-bs-toggle="list" href="#refused-list-2" role="tab" aria-controls="refused-list-2">Company example 2 - Position 2 <span id="notifAmount" class="badge refused right">Refused</span></a>
              <a class="list-group-item list-group-item-action small" id="refused-list-3-list" data-bs-toggle="list" href="#refused-list-3" role="tab" aria-controls="refused-list-3">Company example 3 - Position 3 <span id="notifAmount" class="badge refused right">Refused</span></a>
              <a class="list-group-item list-group-item-action small" id="refused-list-4-list" data-bs-toggle="list" href="#refused-list-4" role="tab" aria-controls="refused-list-4">Company example 4 - Position 4 <span id="notifAmount" class="badge refused right">Refused</span></a>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade small active show" id="refused-list-1" role="tabpanel" aria-labelledby="list-1-list">
                <div class="s_result">
                  <div class="in_desc">
                    <div>
                      <h3 class="medium off_name">First offer</h3>
                      <h4 class="small off_company">DC Incorporated</h4>
                    </div>
                    <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                    <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Canceled</div>
                    </div>
                  </div>
                  <div class="in_logo">
                    <div>
                      <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    </div>
                    <div>
                      <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade small" id="refused-list-2" role="tabpanel" aria-labelledby="list-2-list">
                <div class="s_result">
                  <div class="in_desc">
                    <div>
                      <h3 class="medium off_name">Second offer</h3>
                      <h4 class="small off_company">DC Incorporated</h4>
                    </div>
                    <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                    <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Canceled</div>
                    </div>
                  </div>
                  <div class="in_logo">
                    <div>
                      <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    </div>
                    <div>
                      <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade small" id="refused-list-3" role="tabpanel" aria-labelledby="list-3-list">
                <div class="s_result">
                  <div class="in_desc">
                    <div>
                      <h3 class="medium off_name">Third offer</h3>
                      <h4 class="small off_company">DC Incorporated</h4>
                    </div>
                    <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                    <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Canceled</div>
                    </div>
                  </div>
                  <div class="in_logo">
                    <div>
                      <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    </div>
                    <div>
                      <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade small" id="refused-list-4" role="tabpanel" aria-labelledby="list-3-list">
                <div class="s_result">
                  <div class="in_desc">
                    <div>
                      <h3 class="medium off_name">Fourth offer</h3>
                      <h4 class="small off_company">DC Incorporated</h4>
                    </div>
                    <p class="mini">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</p>
                    <h4 class="mini">Evreux (27000) - Publication 04/05/2022 - IT</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Canceled</div>
                    </div>
                  </div>
                  <div class="in_logo">
                    <div>
                      <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                    </div>
                    <div>
                      <a href="offers_detail.php" role="button" class="small btn see" id="seeoff">See Offer</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include "./phpscripts/footer.php"
  ?>
</body>

</html>