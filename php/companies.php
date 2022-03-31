<?php
function displayCompanie()
{
    if($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['role'] == 5)
    {
    $query = 'SELECT company_name,company.description,cityname,zipcode,sector_activity,company.id_company from company 
    INNER JOIN  address on company.id_company = address.id_company
    INNER JOIN city on address.id_city = city.id_city WHERE 1=1 AND visible = 1';
    }
    elseif($_SESSION['role'] == 3 || $_SESSION['role'] == 4)
    {
    $query = 'SELECT company_name,company.description,cityname,zipcode,sector_activity,company.id_company from company 
    INNER JOIN  address on company.id_company = address.id_company
    INNER JOIN city on address.id_city = city.id_city WHERE 1=1';
    }
    if(!empty($_GET["company_name"])){
        $query=$query." AND company_name LIKE '%".$_GET['company_name']."%'";
    }
    if(!empty($_GET["location"])){                                      //get the "location" value
        if($_GET["location"] == "Any Location"){                        //if the value of "location" is "Any location", the variable $quary won't change
        }else $query=$query." AND cityname='".$_GET["location"]."'";    //if the value of "location" is one of a city, the variable $quary will be updated whith the name of the city
    }
    if(!empty($_GET["sector_activity"])){                                                   //get the "sector_activity" value
        if($_GET["sector_activity"] == "Any Sector"){                                       //if the value of "sector_activity" is "Any Sector", the variable $quary won't change
        }else $query=$query." AND sector_activity='".$_GET["sector_activity"]."'";          //if the value of "sector_activity" is one of a Sector, the variable $quary will be updated whith the name of the Sector
    }
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        $count = $sql->rowCount();

        //Result
        ?>
        <h2 class="title big results">
            <?php
            echo "$count Results";
            ?>
        </h2>
        <?php

        if (isset($row[0]) == 1) {
            foreach ($row as $value) : ?>
        <div class="result">
            <img src="./assets/pictures/logo.jpg" alt="Logo 1" class="logoentreprise">
            <div class="in_desc">
            <h3 class="medium"><?php  echo $value[0] ?></h3>
            <p class="mini"><?php echo $value[1] ?></p>
            <h4 class="mini loca"><?php echo $value[2] ?>(<?php echo $value[3] ?>) - <?php echo $value[4] ?></h4>
            </div>
            <a role="button" href="./companies_detail.php?id_company=<?php echo $value[5]?>" class="small btn detail see">See</a>
        </div>  
        <?php endforeach; 
            }
        }   catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode(); 
        }
    }