<?php
function searchcompany($name, $location, $sector){

$name = $_POST['company_name'];
$location = $_POST['location'];
$sector = $_POST['sector_activity'];
try {
    include dirname(__FILE__) . "./db.php"; //Used to get global pdo
    $stm = $pdo->prepare('SELECT company_name,company.description,cityname,zipcode,sector_activity from company 
    INNER JOIN  address on company.id_company = address.id_company
    INNER JOIN city on address.id_city = city.id_city
    where company_name = ? and cityname= ? and sector_activity=?'); //prepared statement to verify email and password
    $sql->bindParam(1, $_GET['company_name']);
    $sql->bindParam(2, $_GET['location']);
    $sql->bindParam(3, $_GET['sector_activity']);
    $stm->execute();
    $row = $stm->fetchAll();
    if (isset($row[0]) == 1) {
        foreach ($row as $value) : ?>
            <div class="result">
            <img src="./assets/pictures/logo.jpg" alt="Logo 1" class="logoentreprise">
        <div class="in_desc">
        <h3 class="medium"><?php  echo $value[0] ?></h3>
        <p class="mini"><?php echo $value[1] ?></p>
        <h4 class="mini loca"><?php echo $value[2] ?>(<?php echo $value[3] ?>) - <?php echo $value[4] ?></h4>
        </div>
        <a role="button" href="./companies_detail.php" class="small btn detail">See</a>
    </div>  
    <?php endforeach;

    }
} catch (\PDOException $e) {
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}
}
?>
