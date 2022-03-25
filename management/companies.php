<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>VMS | Company creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stylesheets/management/companies.scss">
    <link rel="stylesheet" href="/stylesheets/global.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

</head>


<body>
    <header>
        <?php
        include "../php/navbar.php"
        ?>
    </header>
    <div class="d-flex align-items-center justify-content-center madiv ">
        <!-- this is the white box -->
        <div class="mainbox row">

            <!-- COMPANY CREATION -->
            <div class="mantitl">
                <h1 class="big titl">COMPANY CREATION</h1>
            </div>
            <div class="col-sm-6 divg">
                <div class="orga">
                    <label for="nametbx" class="tbxindicator small">Name</label>
                    <input type="text" class="form-control tbx medium" id="nametbx" placeholder="VTM Incorporated"> <!-- name field -->
                </div>
                <div class="orga">
                    <label for="mailtbx" class="tbxindicator small">Email</label>
                    <input type="text" class="form-control tbx medium" id="mailtbx" placeholder="VTM.Incorporated@vtm.com"> <!-- email field -->
                </div>
                <div class="orga">
                    <label for="stnametbx" class="tbxindicator small">Street Name</label>
                    <input type="text" class="form-control tbx medium" id="stnametbx" placeholder="Garry Vignot boulevard"> <!-- street name field -->
                </div>
                <div class="orga">
                    <label for="bnametbx" class="tbxindicator small">Building Name</label>
                    <input type="text" class="form-control tbx medium" id="bnametbx" placeholder="Almas Tower"> <!-- building name field -->
                </div>
                <div class="orga">
                    <label for="citytbx" class="tbxindicator small">City</label>
                    <input type="text" class="form-control tbx medium" id="citytbx" placeholder="Florianopolis"> <!-- city name field -->
                </div>

            </div>
            <div class="col-sm-6 row divd">
                <div class="orga">
                    <label for="sectortbx" class="tbxindicator small">Sector</label> <!-- sector field -->
                    <select class="form-control tbx medium" name="company" id="sectortbx">
                        <option selected>SECTOR</option>
                        <option>SECTOR 1</option>
                        <option>SECTOR 2</option>
                    </select>
                </div>
                <div class="orga">
                </div>
                <div class="orga">
                    <label for="stnumbtbx" class="tbxindicator small">Street Name</label>
                    <input type="text" class="form-control tbx medium" id="stnumbtbx" placeholder="22 bis"> <!-- street number field -->
                </div>
                <div class="orga">
                    <label for="floortbx" class="tbxindicator small">Floor</label>
                    <input type="number" class="form-control tbx medium" id="floortbx" placeholder="57"> <!-- floor number field -->
                </div>
                <div class="orga">
                    <label for="ziptbx" class="tbxindicator small">ZIP code</label>
                    <input type="text" class="form-control tbx medium" id="ziptbx" placeholder="92800"> <!-- zip code field -->
                </div>
            </div>

            <div>
                <!--Ci-dessous le bouton submit-->
                <input type="submit" class="btn-primary btn Medium" id="logbtn" value="NEW COMPANY">
            </div>


            <!-- COMPANY DELETION -->
            <div class="mantitl">
                <h1 class="big titl">COMPANY DELETION</h1>
            </div>
            <div class="col-sm-6 divg">
                <div class="orga">
                    <label for="dnametbx" class="tbxindicator small">Enter the name of the company to be deleted</label>
                    <input type="text" class="form-control tbx medium" id="dnametbx" placeholder="VTM Incorporated"> <!-- name field -->
                </div>
            </div>
            <div>
                <!--Ci-dessous le bouton submit-->
                <input type="submit" class="btn-primary btn Medium" id="dlogbtn" value="DELETE COMPANY">
            </div>

            <!-- COMPANY MODIFICATION -->
            <div class="mantitl">
                <h1 class="big titl">COMPANY MODIFICATION</h1>
            </div>
            <div class="col-sm-6 divg">
                <div class="orga">
                    <label for="mnametbx" class="tbxindicator small">Name</label>
                    <input type="text" class="form-control tbx medium" id="mnametbx" placeholder="VTM Incorporated"> <!-- name field -->
                </div>
                <div class="orga">
                    <label for="mmailtbx" class="tbxindicator small">Email</label>
                    <input type="text" class="form-control tbx medium" id="mmailtbx" placeholder="VTM.Incorporated@vtm.com"> <!-- email field -->
                </div>
                <div class="orga">
                    <label for="mstnametbx" class="tbxindicator small">Street Name</label>
                    <input type="text" class="form-control tbx medium" id="mstnametbx" placeholder="Garry Vignot boulevard"> <!-- street name field -->
                </div>
                <div class="orga">
                    <label for="mbnametbx" class="tbxindicator small">Building Name</label>
                    <input type="text" class="form-control tbx medium" id="mbnametbx" placeholder="Almas Tower"> <!-- building name field -->
                </div>
                <div class="orga">
                    <label for="mcitytbx" class="tbxindicator small">City</label>
                    <input type="text" class="form-control tbx medium" id="mcitytbx" placeholder="Florianopolis"> <!-- city name field -->
                </div>

            </div>
            <div class="col-sm-6 row divd">
                <div class="orga">
                    <label for="msectortbx" class="tbxindicator small">Sector</label> <!-- sector field -->
                    <select class="form-control tbx medium" name="company" id="msectortbx">
                        <option selected>SECTOR</option>
                        <option>SECTOR 1</option>
                        <option>SECTOR 2</option>
                    </select>
                </div>
                <div class="orga">
                </div>
                <div class="orga">
                    <label for="mstnumbtbx" class="tbxindicator small">Street Name</label>
                    <input type="text" class="form-control tbx medium" id="mstnumbtbx" placeholder="22 bis"> <!-- street number field -->
                </div>
                <div class="orga">
                    <label for="mfloortbx" class="tbxindicator small">Floor</label>
                    <input type="number" class="form-control tbx medium" id="mfloortbx" placeholder="57"> <!-- floor number field -->
                </div>
                <div class="orga">
                    <label for="mziptbx" class="tbxindicator small">ZIP code</label>
                    <input type="text" class="form-control tbx medium" id="mziptbx" placeholder="92800"> <!-- zip code field -->
                </div>
            </div>

            <div>
                <!--Ci-dessous le bouton submit-->
                <input type="submit" class="btn-primary btn Medium" id="mlogbtn" value="MODIFY COMPANY">
            </div>

        </div>
    </div>
    <?php
    include "../php/footer.php"
    ?>
</body>


</html>