<?php
function displayOffers()
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('SELECT offer_name,company.company_name,offers.description,cityname,zipcode,offer_date,sector_activity,offers.id_offer from offers
        INNER JOIN company on offers.id_company = company.id_company
        INNER JOIN address on company.id_company = address.id_company
        INNER JOIN city on address.id_city = city.id_city
        ');
        $sql->execute();
        $row = $sql->fetchAll();
        if (isset($row[0]) == 1) {
            foreach ($row as $value) {
                echo '<div class="s_result">';
                echo '<div class="in_desc">
            <div>
                <h3 class="medium off_name">' . $value[0] . '</h3>
                <h4 class="small off_company">' . $value[1] . '</h4>
                </div>
                <p class="mini">' . $value[2] . '</p>
                <h4 class="mini"> ' . $value[3] . '(' . $value[4] . ') - ' . $value[5] . ' - '. $value[6]. '</h4>
            </div>  
            <div class="in_logo">
            <div>
                <img src="./assets/pictures/logo2.jpg" alt="Logo" class="logoentreprise">
            </div>
            <div>
                <a href="offers_detail.php?offer_id='. $value[7].'" role="button" class="small btn see">See Offer</a>
            </div>
        </div>
    </div>
        ';
            }
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}


        
           
       
        
          
          
       
       