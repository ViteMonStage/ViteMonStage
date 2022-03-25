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
    include "./php/navbar.php"
    ?>
</header>

<body>
    <!--Offer description-->
    <div class="off_desc">
        <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
        <div class="off_desc_txt">
            <h2 class="big">Offer name</h2>
            <h4 class="small">Company name</h4>
            <h4 class="small">Company location</h4>
            <h4 class="small">Date of publication</h4>
            <h4 class="small">Number of candidates</h4>
            <h4 class="small">Offer starting date - Offer ending date</h4>
        </div>
        <div class="off_wish">
            <div class="off_wish_d1">
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="off_wish_d2">
                <h5 class="mini"> Add to wishlist</h5>
            </div>
        </div>

    </div>
    <!--"Apply" section-->
    <div class="off_apply">
        <button type="button" class="small btn see smalltitle bigtitle" data-bs-toggle="modal" data-bs-target="#apply">
            Apply
        </button>
        <a href="companies_detail.php" role="button" class="small btn see smalltitle bigtitle">Company detail</a>
    </div>

    <!--Offer details-->
    <div class="off_det">
        <h3 class="medium">Offer details</h3>
        <h5 class="small">Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in euismod leo. Sed...</h5>


    </div>
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
                        <input class="form-control small" type="file" id="resumeFile" accept=".jpg,.docx,.png,.pdf">
                    </div>
                    <div class="mb-3">
                        <label for="motivationLetterFile" class="form-label small">Select your motivation letter *</label>
                        <input class="form-control small" type="file" id="motivationLetterFile" accept=".jpg,.docx,.png,.pdf">
                    </div>
                    <p class="mini">* Field required, only .jpg, .docx, .png, .pdf accepted</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn small" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn small">Send application</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "./php/footer.php"
    ?>
</body>

</html>