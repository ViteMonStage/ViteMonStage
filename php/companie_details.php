<?php
function displayCompaniedetails()
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT company_name,company.description,cityname,zipcode,sector_activity,pilot_trust,company.id_company from company 
        INNER JOIN  address on company.id_company = address.id_company
        INNER JOIN city on address.id_city = city.id_city
        LEFT JOIN  trust on trust.id_company = company.id_company
        where company.id_company = ?
        ');
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
                        <h4 class="mini">Confiance des pilotes : <?php echo $value[5] ?></h4>
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
