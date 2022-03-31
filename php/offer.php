<?php
function displayOffers()
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $query = 'SELECT offer_name,company.company_name,offers.description,cityname,zipcode,offer_date,offers.salary,offers.id_offer,offers.number_interns,offers.skills,promotion_type from offers
        INNER JOIN company on offers.id_company = company.id_company
        INNER JOIN address on company.id_company = address.id_company
        INNER JOIN city on address.id_city = city.id_city
        LEFT JOIN concern on concern.id_offer = offers.id_offer
        LEFT JOIN promotion_type on promotion_type.id_promotion_type = concern.id_promotion_type
        WHERE 1=1
        ';

        if(!empty($_GET["offer_name"])){
            $query=$query." LIKE offer_name='".$_GET["offer_name"]."'";
        }
        if(!empty($_GET["offer_location"])){                                      //get the "location" value
            if($_GET["offer_location"] == "Any Location"){                        //if the value of "location" is "Any location", the variable $quary won't change
            }else $query=$query." AND cityname='".$_GET["offer_location"]."'";    //if the value of "location" is one of a city, the variable $quary will be updated whith the name of the city
        }
        if(!empty($_GET["min_place_offer"])){
            $query=$query." AND number_interns>'".$_GET["min_place_offer"]."'";
        }
        if(!empty($_GET["company_name"])){
            $query=$query." AND company_name='".$_GET["duration"]."'";
        }
        if(!empty($_GET["promotion"])){                                      //get the "location" value
            if($_GET["promotion"] == "Any Promotion"){                        //if the value of "location" is "Any location", the variable $quary won't change
            }else $query=$query." AND promotion_type='".$_GET["promotion"]."'";    //if the value of "location" is one of a city, the variable $quary will be updated whith the name of the city
        }

        $sql = $pdo->prepare($query);  
        $sql->execute();
        $row = $sql->fetchAll();
        $count = $sql->rowCount();

        //Result
        ?>
        <h2 class="title big results">
            <?php echo "$count Results";?>
        </h2>
        <?php
        if (isset($row[0]) == 1) {
            foreach ($row as $value) : ?>
                <div class="s_result">
                    <div class="in_desc">
                        <div>
                            <h3 class="medium off_name"><?php echo  $value[0] ?> </h3>
                            <h4 class="small off_company"><?php echo  $value[1] ?></h4>
                        </div>
                        <p class="mini"><?php echo  $value[2] ?></p>
                        <h4 class="mini"><?php echo  $value[6] ?> €/ months</h4>
                        <h4 class="mini"> <?php echo  $value[3] ?> (<?php echo  $value[4] ?>) - <?php echo  $value[5] ?> </h4>
                    </div>
                    <div class="in_logo">
                        <div>
                            <img src="./assets/pictures/logo2.jpg" alt="Logo" class="logoentreprise">
                        </div>
                        <div>
                            <a href="offers_detail.php?id_offer=<?php echo  $value[7] ?>" role="button" class="small btn see">See Offer</a>
                        </div>
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
