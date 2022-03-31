<?php
function companyExists()
{
    if (!isset($_GET['id_company']) == 1) {
        header('HTTP/1.1 404 Not found');
        $contents = file_get_contents('./error/404.php', TRUE);
        die($contents);
    }
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $sql = $pdo->prepare('SELECT company_name from company where company.id_company = ?');
    $sql->bindParam(1, $_GET['id_company']); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->execute(); // Execution of the request 
    $row = $sql->fetchAll(); // Retrieves the rows of the query
    if (!isset($row[0]) == 1) {
        header('HTTP/1.1 404 Not found');
        $contents = file_get_contents('./error/404.php', TRUE);
        die($contents);
    }
}

function displayCompaniedetails()
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SET sql_mode = \'\';');
        $sql->execute(); // Execution of the request 
        $sql = $pdo->prepare('SELECT DISTINCT company_name, description, cityname, zipcode, sector_activity, AVG(pilot_trust), id_company FROM (SELECT company_name,company.description,cityname,zipcode,sector_activity,pilot_trust,company.id_company from company
        INNER JOIN  address on company.id_company = address.id_company
        INNER JOIN city on address.id_city = city.id_city
        LEFT JOIN trust on trust.id_company = company.id_company
        where company.id_company = ?) T1');
        $sql->bindParam(1, $_GET['id_company']); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (isset($row[0]) == 1) {
            foreach ($row as $value) : ?>
                <div class="company_cadre">
                    <div class="image">
                        <img src="./assets/pictures/logo4.png" alt="Logo 1" class="logoentreprise">
                    </div>
                    <div class="company_desc">
                        <h3 class="medium"><?php echo $value[0] ?></h3>
                        <p class="mini"><?php echo $value[1] ?></p>
                        <h4 class="mini"><?php echo $value[2] ?> (<?php echo $value[3] ?>) - <?php echo $value[4] ?></h4>
                        <h4 class="mini">Pilot's trust : <?php echo isset($value[5]) ? roundToOneDecimalIfNotInteger($value[5]).' <i class="fa-solid fa-star"></i>' : 'No pilot rated trust yet' ?></h4>
                    </div>
                </div>
            <?php endforeach;
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}


function displayRatingOptions($id_user, $id_company)
{
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    if ($_SESSION["role"] == 1) :
        $sql = $pdo->prepare('SELECT * FROM 8aah0fCXko.evaluation WHERE id_user=? AND id_company=?');
        $sql->bindParam(1, $id_user); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->bindParam(2, $id_company); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (empty($row)) : ?>
            <form action="/php/send_rating.php?id_company=<?php echo $id_company ?>" method="POST">
                <div class="evaluate">
                    <div class="row g-0">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="medium evaluate_title">Rate the company </h3>
                            <div class="rating-box">
                                <div class="evaluate_criteria">
                                    <p class="criteria mini">Working environnement : </p>
                                    <div class="rate starrating not risingstar d-flex justify-content-center flex-row-reverse">
                                        <input type="radio" id="1-star5" name="working-environnement-rating" value="5" id="groupe1" /><label for="1-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="1-star4" name="working-environnement-rating" value="4" /><label for="1-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="1-star3" name="working-environnement-rating" value="3" /><label for="1-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="1-star2" name="working-environnement-rating" value="2" /><label for="1-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="1-star1" name="working-environnement-rating" value="1" /><label for="1-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                    </div>
                                </div>
                                <div class="evaluate_criteria">
                                    <p class="criteria mini">Working conditions : </p>
                                    <div class="rate starrating not risingstar d-flex justify-content-center flex-row-reverse">
                                        <input type="radio" id="2-star5" name="working-conditions-rating" value="5" id="groupe2" /><label for="2-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="2-star4" name="working-conditions-rating" value="4" /><label for="2-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="2-star3" name="working-conditions-rating" value="3" /><label for="2-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="2-star2" name="working-conditions-rating" value="2" /><label for="2-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="2-star1" name="working-conditions-rating" value="1" /><label for="2-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                    </div>
                                </div>
                                <div class="evaluate_criteria">
                                    <p class="criteria mini">Wage : </p>
                                    <div class="rate starrating not risingstar d-flex justify-content-center flex-row-reverse">
                                        <input type="radio" id="3-star5" name="wage-rating" value="5" id="groupe3" /><label for="3-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="3-star4" name="wage-rating" value="4" /><label for="3-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="3-star3" name="wage-rating" value="3" /><label for="3-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="3-star2" name="wage-rating" value="2" /><label for="3-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="3-star1" name="wage-rating" value="1" /><label for="3-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                    </div>
                                </div>
                                <div class="evaluate_criteria">
                                    <p class="criteria mini">Acquired experience : </p>
                                    <div class="rate starrating not risingstar d-flex justify-content-center flex-row-reverse">
                                        <input type="radio" id="4-star5" name="acquired-experience-rating" value="5" id="groupe4" /><label for="4-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="4-star4" name="acquired-experience-rating" value="4" /><label for="4-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="4-star3" name="acquired-experience-rating" value="3" /><label for="4-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="4-star2" name="acquired-experience-rating" value="2" /><label for="4-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="4-star1" name="acquired-experience-rating" value="1" /><label for="4-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                    </div>
                                </div>
                                <div class="evaluate_criteria">
                                    <p class="criteria mini">Supervision quality : </p>
                                    <div class="rate starrating not risingstar d-flex justify-content-center flex-row-reverse">
                                        <input type="radio" id="5-star5" name="supervision-quality-rating" value="5" id="groupe5" /><label for="5-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="5-star4" name="supervision-quality-rating" value="4" /><label for="5-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="5-star3" name="supervision-quality-rating" value="3" /><label for="5-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="5-star2" name="supervision-quality-rating" value="2" /><label for="5-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                        <input type="radio" id="5-star1" name="supervision-quality-rating" value="1" /><label for="5-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="medium evaluate_title">Describe your experience </h3>
                            <textarea class="form-control ltbx medium" id="desctbx" name="desctbx" placeholder="Describe your experience..."></textarea> <!-- description field -->
                        </div>
                        <input type="submit" class="small btn submit" value="Submit" id="btn-submit">
                    </div>
                </div>
            </form>
        <?php else : ?>
            <div class="evaluate">
                <div class="row g-0">
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="medium evaluate_title"><strong>Your rating</strong></h3>
                        <div class="rating-box">
                            <div class="evaluate_criteria">
                                <p class="criteria mini">Working environnement : </p>
                                <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="1-star5" class="uncheckable" name="working-environnement-rating" value="5" <?php echo ($row[0][1] == 5) ? 'checked' : '' ?> /><label for="1-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="1-star4" class="uncheckable" name="working-environnement-rating" value="4" <?php echo ($row[0][1] == 4) ? 'checked' : '' ?> /><label for="1-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="1-star3" class="uncheckable" name="working-environnement-rating" value="3" <?php echo ($row[0][1] == 3) ? 'checked' : '' ?> /><label for="1-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="1-star2" class="uncheckable" name="working-environnement-rating" value="2" <?php echo ($row[0][1] == 2) ? 'checked' : '' ?> /><label for="1-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="1-star1" class="uncheckable" name="working-environnement-rating" value="1" <?php echo ($row[0][1] == 1) ? 'checked' : '' ?> /><label for="1-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                </div>
                            </div>
                            <div class="evaluate_criteria">
                                <p class="criteria mini">Working conditions : </p>
                                <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="2-star5" class="uncheckable" name="working-conditions-rating" value="5" <?php echo ($row[0][2] == 5) ? 'checked' : '' ?> /><label for="2-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="2-star4" class="uncheckable" name="working-conditions-rating" value="4" <?php echo ($row[0][2] == 4) ? 'checked' : '' ?> /><label for="2-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="2-star3" class="uncheckable" name="working-conditions-rating" value="3" <?php echo ($row[0][2] == 3) ? 'checked' : '' ?> /><label for="2-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="2-star2" class="uncheckable" name="working-conditions-rating" value="2" <?php echo ($row[0][2] == 2) ? 'checked' : '' ?> /><label for="2-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="2-star1" class="uncheckable" name="working-conditions-rating" value="1" <?php echo ($row[0][2] == 1) ? 'checked' : '' ?> /><label for="2-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                </div>
                            </div>
                            <div class="evaluate_criteria">
                                <p class="criteria mini">Wage : </p>
                                <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="3-star5" class="uncheckable" name="wage-rating" value="5" <?php echo ($row[0][3] == 5) ? 'checked' : '' ?> /><label for="3-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="3-star4" class="uncheckable" name="wage-rating" value="4" <?php echo ($row[0][3] == 4) ? 'checked' : '' ?> /><label for="3-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="3-star3" class="uncheckable" name="wage-rating" value="3" <?php echo ($row[0][3] == 3) ? 'checked' : '' ?> /><label for="3-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="3-star2" class="uncheckable" name="wage-rating" value="2" <?php echo ($row[0][3] == 2) ? 'checked' : '' ?> /><label for="3-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="3-star1" class="uncheckable" name="wage-rating" value="1" <?php echo ($row[0][3] == 1) ? 'checked' : '' ?> /><label for="3-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                </div>
                            </div>
                            <div class="evaluate_criteria">
                                <p class="criteria mini">Acquired experience : </p>
                                <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="4-star5" class="uncheckable" name="acquired-experience-rating" value="5" <?php echo ($row[0][4] == 5) ? 'checked' : '' ?> /><label for="4-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="4-star4" class="uncheckable" name="acquired-experience-rating" value="4" <?php echo ($row[0][4] == 4) ? 'checked' : '' ?> /><label for="4-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="4-star3" class="uncheckable" name="acquired-experience-rating" value="3" <?php echo ($row[0][4] == 3) ? 'checked' : '' ?> /><label for="4-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="4-star2" class="uncheckable" name="acquired-experience-rating" value="2" <?php echo ($row[0][4] == 2) ? 'checked' : '' ?> /><label for="4-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="4-star1" class="uncheckable" name="acquired-experience-rating" value="1" <?php echo ($row[0][4] == 1) ? 'checked' : '' ?> /><label for="4-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                </div>
                            </div>
                            <div class="evaluate_criteria">
                                <p class="criteria mini">Supervision quality : </p>
                                <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="5-star5" class="uncheckable" name="supervision-quality-rating" value="5" <?php echo ($row[0][5] == 5) ? 'checked' : '' ?> /><label for="5-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="5-star4" class="uncheckable" name="supervision-quality-rating" value="4" <?php echo ($row[0][5] == 4) ? 'checked' : '' ?> /><label for="5-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="5-star3" class="uncheckable" name="supervision-quality-rating" value="3" <?php echo ($row[0][5] == 3) ? 'checked' : '' ?> /><label for="5-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="5-star2" class="uncheckable" name="supervision-quality-rating" value="2" <?php echo ($row[0][5] == 2) ? 'checked' : '' ?> /><label for="5-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="5-star1" class="uncheckable" name="supervision-quality-rating" value="1" <?php echo ($row[0][5] == 1) ? 'checked' : '' ?> /><label for="5-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="medium evaluate_title"><strong>Experience description</strong></h3>
                        <p class="small rating-description"><?php echo $row[0][6] ?></p>
                    </div>
                </div>
            </div>
        <?php
        endif;
    endif;
    if ($_SESSION["role"] == 3) : 
        $sql = $pdo->prepare('SELECT * FROM 8aah0fCXko.trust WHERE id_user=? AND id_company=?');
        $sql->bindParam(1, $id_user); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->bindParam(2, $id_company); // Assigning the id_offer parameter in the request and retrieving it from the url
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
        if (empty($row)) : ?>
        <form action="/php/send_trust.php?id_company=<?php echo $id_company ?>" method="POST">
            <div class="evaluate">
                <div class="row g-0">
                    <div class="col-lg-12 col-sm-12">
                        <h3 class="medium evaluate_title">Do you trust the company ?</h3>
                        <div class="rating-box">
                            <div class="evaluate_criteria">
                                <p class="criteria mini">Company trust : </p>
                                <div class="rate starrating not risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="6-star5" name="company-trust-rating" value="5" id="groupe1" /><label for="6-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="6-star4" name="company-trust-rating" value="4" /><label for="6-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="6-star3" name="company-trust-rating" value="3" /><label for="6-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="6-star2" name="company-trust-rating" value="2" /><label for="6-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="6-star1" name="company-trust-rating" value="1" /><label for="6-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="small btn submit" value="Submit" id="btn-submit-tutor">
                </div>
            </div>
        </form>
    <?php
    else:?>
        <div class="evaluate">
                <div class="row g-0">
                    <div class="col-lg-12 col-sm-12">
                        <h3 class="medium evaluate_title">Do you trust the company ?</h3>
                        <div class="rating-box">
                            <div class="evaluate_criteria">
                                <p class="criteria mini">Company trust : </p>
                                <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="6-star5" class="uncheckable" name="company-trust-rating" value="5" id="groupe1" <?php echo ($row[0][1] == 5) ? 'checked' : '' ?>/><label for="6-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="6-star4" class="uncheckable" name="company-trust-rating" value="4" <?php echo ($row[0][1] == 4) ? 'checked' : '' ?>/><label for="6-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="6-star3" class="uncheckable" name="company-trust-rating" value="3" <?php echo ($row[0][1] == 3) ? 'checked' : '' ?>/><label for="6-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="6-star2" class="uncheckable" name="company-trust-rating" value="2" <?php echo ($row[0][1] == 2) ? 'checked' : '' ?>/><label for="6-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                                    <input type="radio" id="6-star1" class="uncheckable" name="company-trust-rating" value="1" <?php echo ($row[0][1] == 1) ? 'checked' : '' ?>/><label for="6-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php endif; endif;
}

function displayAllRating($id_company)
{
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $sql = $pdo->prepare('SELECT id_evaluation, working_environnement, working_condition, wage, acquired_experience, supervision_quality, description, id_company, user.id_user, firstname, lastname FROM evaluation INNER JOIN user ON evaluation.id_user=user.id_user WHERE evaluation.id_company=?');
    $sql->bindParam(1, $id_company); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->execute(); // Execution of the request 
    $row = $sql->fetchAll(); // Retrieves the rows of the query
    foreach ($row as $key => $value) : ?>
        <div class="profile_results row">
            <h3 class="medium results_title">Evaluations</h3>
            <div class="profile col-md-8">
                <div class="avatar">
                    <img src="./assets/pictures/avatar.jpg" alt="Avatar" class="avatar_size">
                </div>
                <div class="avatar_desc">
                    <h3 class="medium"><?php echo $value[9] ?> <?php echo $value[10] ?></h3>
                    <p class="mini"><?php echo $value[6] ?></p>
                </div>
            </div>
            <div class="results col-md-3">
                <div class="results_criteria">
                    <p class="criteria mini">Working environnement : </p>
                    <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                        <input type="radio" id="1<?php echo $key ?>-star5" class="uncheckable" name="working-environnement-rating<?php echo $key ?>" value="5" <?php echo ($value[1] == 5) ? 'checked' : '' ?> /><label for="1-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="1<?php echo $key ?>-star4" class="uncheckable" name="working-environnement-rating<?php echo $key ?>" value="4" <?php echo ($value[1] == 4) ? 'checked' : '' ?> /><label for="1-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="1<?php echo $key ?>-star3" class="uncheckable" name="working-environnement-rating<?php echo $key ?>" value="3" <?php echo ($value[1] == 3) ? 'checked' : '' ?> /><label for="1-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="1<?php echo $key ?>-star2" class="uncheckable" name="working-environnement-rating<?php echo $key ?>" value="2" <?php echo ($value[1] == 2) ? 'checked' : '' ?> /><label for="1-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="1<?php echo $key ?>-star1" class="uncheckable" name="working-environnement-rating<?php echo $key ?>" value="1" <?php echo ($value[1] == 1) ? 'checked' : '' ?> /><label for="1-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                    </div>
                </div>
                <div class="results_criteria">
                    <p class="criteria mini">Working conditions : </p>
                    <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                        <input type="radio" id="2<?php echo $key ?>-star5" class="uncheckable" name="working-conditions-rating<?php echo $key ?>" value="5" <?php echo ($value[2] == 5) ? 'checked' : '' ?> /><label for="2-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="2<?php echo $key ?>-star4" class="uncheckable" name="working-conditions-rating<?php echo $key ?>" value="4" <?php echo ($value[2] == 4) ? 'checked' : '' ?> /><label for="2-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="2<?php echo $key ?>-star3" class="uncheckable" name="working-conditions-rating<?php echo $key ?>" value="3" <?php echo ($value[2] == 3) ? 'checked' : '' ?> /><label for="2-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="2<?php echo $key ?>-star2" class="uncheckable" name="working-conditions-rating<?php echo $key ?>" value="2" <?php echo ($value[2] == 2) ? 'checked' : '' ?> /><label for="2-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="2<?php echo $key ?>-star1" class="uncheckable" name="working-conditions-rating<?php echo $key ?>" value="1" <?php echo ($value[2] == 1) ? 'checked' : '' ?> /><label for="2-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                    </div>
                </div>
                <div class="results_criteria">
                    <p class="criteria mini">Wage : </p>
                    <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                        <input type="radio" id="3<?php echo $key ?>-star5" class="uncheckable" name="wage-rating<?php echo $key ?>" value="5" <?php echo ($value[3] == 5) ? 'checked' : '' ?> /><label for="3-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="3<?php echo $key ?>-star4" class="uncheckable" name="wage-rating<?php echo $key ?>" value="4" <?php echo ($value[3] == 4) ? 'checked' : '' ?> /><label for="3-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="3<?php echo $key ?>-star3" class="uncheckable" name="wage-rating<?php echo $key ?>" value="3" <?php echo ($value[3] == 3) ? 'checked' : '' ?> /><label for="3-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="3<?php echo $key ?>-star2" class="uncheckable" name="wage-rating<?php echo $key ?>" value="2" <?php echo ($value[3] == 2) ? 'checked' : '' ?> /><label for="3-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="3<?php echo $key ?>-star1" class="uncheckable" name="wage-rating<?php echo $key ?>" value="1" <?php echo ($value[3] == 1) ? 'checked' : '' ?> /><label for="3-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                    </div>
                </div>
                <div class="results_criteria">
                    <p class="criteria mini">Acquired experience : </p>
                    <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                        <input type="radio" id="4<?php echo $key ?>-star5" class="uncheckable" name="acquired-experience-rating<?php echo $key ?>" value="5" <?php echo ($value[4] == 5) ? 'checked' : '' ?> /><label for="4-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="4<?php echo $key ?>-star4" class="uncheckable" name="acquired-experience-rating<?php echo $key ?>" value="4" <?php echo ($value[4] == 4) ? 'checked' : '' ?> /><label for="4-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="4<?php echo $key ?>-star3" class="uncheckable" name="acquired-experience-rating<?php echo $key ?>" value="3" <?php echo ($value[4] == 3) ? 'checked' : '' ?> /><label for="4-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="4<?php echo $key ?>-star2" class="uncheckable" name="acquired-experience-rating<?php echo $key ?>" value="2" <?php echo ($value[4] == 2) ? 'checked' : '' ?> /><label for="4-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="4<?php echo $key ?>-star1" class="uncheckable" name="acquired-experience-rating<?php echo $key ?>" value="1" <?php echo ($value[4] == 1) ? 'checked' : '' ?> /><label for="4-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                    </div>
                </div>
                <div class="results_criteria">
                    <p class="criteria mini">Supervision quality : </p>
                    <div class="rate starrating risingstar d-flex justify-content-center flex-row-reverse">
                        <input type="radio" id="5<?php echo $key ?>-star5" class="uncheckable" name="supervision-quality-rating<?php echo $key ?>" value="5" <?php echo ($value[5] == 5) ? 'checked' : '' ?> /><label for="5-star5" title="5 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="5<?php echo $key ?>-star4" class="uncheckable" name="supervision-quality-rating<?php echo $key ?>" value="4" <?php echo ($value[5] == 4) ? 'checked' : '' ?> /><label for="5-star4" title="4 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="5<?php echo $key ?>-star3" class="uncheckable" name="supervision-quality-rating<?php echo $key ?>" value="3" <?php echo ($value[5] == 3) ? 'checked' : '' ?> /><label for="5-star3" title="3 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="5<?php echo $key ?>-star2" class="uncheckable" name="supervision-quality-rating<?php echo $key ?>" value="2" <?php echo ($value[5] == 2) ? 'checked' : '' ?> /><label for="5-star2" title="2 star"><i class="fa-solid fa-star"></i> </label>
                        <input type="radio" id="5<?php echo $key ?>-star1" class="uncheckable" name="supervision-quality-rating<?php echo $key ?>" value="1" <?php echo ($value[5] == 1) ? 'checked' : '' ?> /><label for="5-star1" title="1 star"><i class="fa-solid fa-star"></i> </label>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach;
}

function roundToOneDecimalIfNotInteger($value){
    $value = floatval($value);
    return round($value,1);
}

?>