<?php
function displayTabInProgress($id_user)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT candidature.id_candidature, user.id_user, progress.id_progress,candidature.id_statut,status.name,offer_name,company.company_name
        FROM 8aah0fCXko.candidature
        INNER JOIN user on candidature.id_user = user.id_user
        INNER JOIN progress on candidature.id_candidature = progress.id_candidature
        INNER JOIN status on candidature.id_statut=status.id_statut
        INNER JOIN offers on offers.id_offer=candidature.id_offer
        INNER JOIN company on company.id_company=offers.id_company
        WHERE status.id_statut=3 AND user.id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
?>
            <?php foreach ($row as $key => $value) : ?>
                <a class="list-group-item list-group-item-action small <?php if ($key == 0) : ?>active<?php endif; ?>" id="current-list-<?php echo $key ?>-list" data-bs-toggle="list" href="#current-list-<?php echo $key ?>" role="tab" aria-controls="current-list-<?php echo $key ?>"><?php echo $value[6] ?> • <?php echo $value[5] ?> <span class="badge bg-secondary right">In progress...</span></a>
            <?php endforeach; ?>
        <?php
        } else { ?>
            <p class="small no-offer">No offer in progress yet...</p>
            <?php }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function displayDescInProgress($id_user)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT candidature.id_candidature, user.id_user, progress.id_progress,candidature.id_statut,status.name,offer_name,company.company_name,offers.description,
        city.cityname,city.zipcode,offer_date
                FROM 8aah0fCXko.candidature
                INNER JOIN user on candidature.id_user = user.id_user
                INNER JOIN progress on candidature.id_candidature = progress.id_candidature
                INNER JOIN status on candidature.id_statut=status.id_statut
                INNER JOIN offers on offers.id_offer=candidature.id_offer
                INNER JOIN company on company.id_company=offers.id_company
                INNER JOIN address on company.id_company=address.id_company
                INNER JOIN city on city.id_city=address.id_city
        WHERE status.id_statut=3 AND user.id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            foreach ($row as $key => $value) : ?>
                <div class="tab-pane fade small <?php if ($key == 0) : ?>active show<?php endif; ?>" id="current-list-<?php echo $key ?>" role="tabpanel">
                    <div class="s_result">
                        <div class="in_desc">
                            <div>
                                <h3 class="medium off_name"><?php echo $value[6] ?></h3>
                                <h4 class="small off_company"><?php echo $value[5] ?></h4>
                            </div>
                            <p class="mini">Description : <?php echo shortenString($value[7]) ?></p>
                            <h4 class="mini"><?php echo shortenString($value[8]) ?> (<?php echo shortenString($value[9]) ?>) - <?php echo shortenString($value[10]) ?> - IT</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo toPercent(getStep($value[0])); ?>%">Step <?php echo getStep($value[0]) ?>/6</div>
                            </div>
                        </div>
                        <div class="in_logo">
                            <div>
                                <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                            </div>
                            <div>
                                <a href="offers_detail.php?id_offer=<?php echo $key + 1 ?>" role="button" class="small btn see" id="seeoff1">See Offer</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function displayTabAccepted($id_user)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT candidature.id_candidature, user.id_user, progress.id_progress,candidature.id_statut,status.name,offer_name,company.company_name
        FROM 8aah0fCXko.candidature
        INNER JOIN user on candidature.id_user = user.id_user
        INNER JOIN progress on candidature.id_candidature = progress.id_candidature
        INNER JOIN status on candidature.id_statut=status.id_statut
        INNER JOIN offers on offers.id_offer=candidature.id_offer
        INNER JOIN company on company.id_company=offers.id_company
        WHERE status.id_statut=1 AND user.id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
        ?>
            <?php foreach ($row as $key => $value) : ?>
                <a class="list-group-item list-group-item-action small <?php if ($key == 0) : ?>active<?php endif; ?>" id="accepted-list-<?php echo $key ?>-list" data-bs-toggle="list" href="#accepted-list-<?php echo $key ?>" role="tab" aria-controls="accepted-list-<?php echo $key ?>"><?php echo $value[6] ?> • <?php echo $value[5] ?><span class="badge success right">Accepted</span></a>
            <?php endforeach; ?>
        <?php
        } else { ?>
            <p class="small no-offer">No accepted offer yet...</p>
            <?php }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function displayDescInAccepted($id_user)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT candidature.id_candidature, user.id_user, progress.id_progress,candidature.id_statut,status.name,offer_name,company.company_name,offers.description,
        city.cityname,city.zipcode,offer_date
                FROM 8aah0fCXko.candidature
                INNER JOIN user on candidature.id_user = user.id_user
                INNER JOIN progress on candidature.id_candidature = progress.id_candidature
                INNER JOIN status on candidature.id_statut=status.id_statut
                INNER JOIN offers on offers.id_offer=candidature.id_offer
                INNER JOIN company on company.id_company=offers.id_company
                INNER JOIN address on company.id_company=address.id_company
                INNER JOIN city on city.id_city=address.id_city
        WHERE status.id_statut=1 AND user.id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            foreach ($row as $key => $value) : ?>
                <div class="tab-pane fade small <?php if ($key == 0) : ?>active show<?php endif; ?>" id="accepted-list-<?php echo $key ?>" role="tabpanel">
                    <div class="s_result">
                        <div class="in_desc">
                            <div>
                                <h3 class="medium off_name"><?php echo $value[6] ?></h3>
                                <h4 class="small off_company"><?php echo $value[5] ?></h4>
                            </div>
                            <p class="mini">Description : <?php echo shortenString($value[7]) ?></p>
                            <h4 class="mini"><?php echo shortenString($value[8]) ?> (<?php echo shortenString($value[9]) ?>) - <?php echo shortenString($value[10]) ?> - IT</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Process completed</div>
                            </div>
                        </div>
                        <div class="in_logo">
                            <div>
                                <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                            </div>
                            <div>
                                <a href="offers_detail.php?id_offer=<?php echo $key + 1 ?>" role="button" class="small btn see" id="seeoff7">See Offer</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function shortenString($string)
{
    if (strlen($string) > 150) {
        $string = substr($string, 0, 150) . "...";
    }
    return $string;
}

if (isset($_GET["add"])) {
}

function displayTabRefused($id_user)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT candidature.id_candidature, user.id_user, progress.id_progress,candidature.id_statut,status.name,offer_name,company.company_name
        FROM 8aah0fCXko.candidature
        INNER JOIN user on candidature.id_user = user.id_user
        INNER JOIN progress on candidature.id_candidature = progress.id_candidature
        INNER JOIN status on candidature.id_statut=status.id_statut
        INNER JOIN offers on offers.id_offer=candidature.id_offer
        INNER JOIN company on company.id_company=offers.id_company
        WHERE status.id_statut=2 AND user.id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
        ?>
            <?php foreach ($row as $key => $value) : ?>
                <a class="list-group-item list-group-item-action small <?php if ($key == 0) : ?>active<?php endif; ?>" id="refused-list-<?php echo $key ?>-list" data-bs-toggle="list" href="#refused-list-<?php echo $key ?>" role="tab" aria-controls="refused-list-<?php echo $key ?>"><?php echo $value[6] ?> • <?php echo $value[5] ?><span class="badge refused right">Refused</span></a>
            <?php endforeach; ?>
        <?php
        } else { ?>
            <p class="small no-offer">No refused offer yet...</p>
            <?php }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function displayDescInRefused($id_user)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT candidature.id_candidature, user.id_user, progress.id_progress,candidature.id_statut,status.name,offer_name,company.company_name,offers.description,
        city.cityname,city.zipcode,offer_date
        FROM 8aah0fCXko.candidature
        INNER JOIN user on candidature.id_user = user.id_user
        INNER JOIN progress on candidature.id_candidature = progress.id_candidature
        INNER JOIN status on candidature.id_statut=status.id_statut
        INNER JOIN offers on offers.id_offer=candidature.id_offer
        INNER JOIN company on company.id_company=offers.id_company
        INNER JOIN address on company.id_company=address.id_company
        INNER JOIN city on city.id_city=address.id_city
        WHERE status.id_statut=2 AND user.id_user=?');
        $stm->bindParam(1, $id_user);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            foreach ($row as $key => $value) : ?>
                <div class="tab-pane fade small <?php if ($key == 0) : ?>active show<?php endif; ?>" id="refused-list-<?php echo $key ?>" role="tabpanel">
                    <div class="s_result">
                        <div class="in_desc">
                            <div>
                                <h3 class="medium off_name"><?php echo $value[6] ?></h3>
                                <h4 class="small off_company"><?php echo $value[5] ?></h4>
                            </div>
                            <p class="mini">Description : <?php echo shortenString($value[7]) ?></p>
                            <h4 class="mini"><?php echo shortenString($value[8]) ?> (<?php echo shortenString($value[9]) ?>) - <?php echo shortenString($value[10]) ?> - IT</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Canceled</div>
                            </div>
                        </div>
                        <div class="in_logo">
                            <div>
                                <img src="./assets/pictures/logo.jpg" alt="Logo" class="logoentreprise">
                            </div>
                            <div>
                                <a href="offers_detail.php?id_offer=<?php echo $key + 1 ?>" role="button" class="small btn see" id="seeoff7">See Offer</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}


function getStep($id_candidature)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $stm = $pdo->prepare('SELECT candidature.id_candidature, user.id_user, progress.id_progress,candidature.id_statut,status.name,offer_name,
        progress.step1,progress.step2,progress.step3,progress.step4,progress.step5,progress.step6
                    FROM 8aah0fCXko.candidature
                    INNER JOIN user on candidature.id_user = user.id_user
                    INNER JOIN progress on candidature.id_candidature = progress.id_candidature
                    INNER JOIN status on candidature.id_statut=status.id_statut
                    INNER JOIN offers on offers.id_offer=candidature.id_offer
                    WHERE candidature.id_candidature=?');
        $stm->bindParam(1, $id_candidature);
        $stm->execute();
        $row = $stm->fetchAll();
        if (isset($row[0]) == 1) {
            if(!is_null($row[0][11])){
                return 6;
            }if(!is_null($row[0][10])){
                return 5;
            }if(!is_null($row[0][9])){
                return 4;
            }if(!is_null($row[0][8])){
                return 3;
            }if(!is_null($row[0][7])){
                return 2;
            }if(!is_null($row[0][6])){
                return 1;
            }
        } else { ?>
            <p class="small no-offer">No offer refused</p>
<?php }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function toPercent($step){
    return floor(($step/6)*100);
}