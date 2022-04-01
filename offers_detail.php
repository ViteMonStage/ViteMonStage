<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Offer details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/global.scss">
    <link rel="stylesheet" href="./stylesheets/offers_detail.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<header>
    <!-- NAVBAR -->
    <?php
    include_once "./php/offer_detail.php";
    include_once "./php/navbar.php";
    include_once "./php/wishlist.php";
    ?>
</header>
<?php
    if ($_SESSION['role'] == 2 && $_SESSION['stats_offer'] == 0) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('./error/403.php', TRUE);
        die($contents);
    }
    ?>
<body>
    <!--Offer description-->
    <!--Function allowing the dynamic display of the detail of an offer -->
    <?php include dirname(__FILE__) . "/php/offer.php";
    alertHandler();
    displayOfferdetail(); displayCandidatureSteps();?>
    <!--"Apply" section-->
    <div class="off_apply">
    <?php if(!hasAlreadySentCandidature()):?>
        <button type="button" class="small btn see smalltitle bigtitle" data-bs-toggle="modal" data-bs-target="#apply">
            Apply
        </button>
        <?php else: ?>
        <button type="button" class="small btn see smalltitle bigtitle disabled">
            Already applied
        </button>
        <?php endif; ?>
        <a href="companies_detail.php?id_company=<?php echo getCompanyFromOffer($_GET["id_offer"])?>" role="button" class="small btn see smalltitle bigtitle">Company detail</a>
    </div>
    <!--Offer details-->
    </div>
    <form action="/php/send_application.php?id_offer=<?php echo $_GET["id_offer"] ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="apply" tabindex="-1" aria-labelledby="applylabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title small" id="applylabel">Postulate to this intership</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="resumeFile" class="form-label small">Select your resume *</label>
                            <input class="form-control small" type="file" id="resumeFile" name="resumeFile">
                        </div>
                        <div class="mb-3">
                            <label for="motivationLetterFile" class="form-label small">Select your motivation letter *</label>
                            <input class="form-control small" type="file" id="motivationLetterFile" name="motivationLetterFile">
                        </div>
                        <p class="mini">* Field required, only .jpg, .docx, .png, .pdf accepted</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn small" data-bs-dismiss="modal">Cancel</button>
                        <input class="btn small" type="submit" id="submit" value="Send application">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    include "./php/footer.php"
    ?>
</body>

</html>