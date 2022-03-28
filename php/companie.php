<?php
function displayCompanie(){
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT company_name,company.description,cityname,zipcode,sector_activity from company 
        INNER JOIN  address on company.id_company = address.id_company
        INNER JOIN city on address.id_city = city.id_city
        ');
        $sql->execute();
        $row = $sql->fetchAll();
        print_r($row[0][0]);
        if (isset($row[0]) == 1) {
            echo '<div class="result">';
            foreach ($row as $value) {
                echo '<img src="./assets/pictures/logo.jpg" alt="Logo 1" class="logoentreprise">
            <div class="in_desc">
            <h3 class="medium">' . $value[1] . '</h3>
            <p class="mini">' . $value[2] . '</p>
            <h4 class="mini loca">' . $value[3] . '(' . $value[4] . ') - ' . $value[5] . '</h4>
            </div>
            <a role="button" href="./companies_detail.php" class="small btn detail">See </a>
        </div>';
            }

            echo '</div>';
        } else {
            echo '<div class="modal-body">
        <p class="small">No new notification</p>
    </div>';
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}


