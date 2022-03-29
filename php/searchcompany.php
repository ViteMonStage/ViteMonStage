<?php
include "./db.php"; //Used to get global pdo


$name = $_POST['company_name'];
$location = $_POST['location'];
$sector = $_POST['sector_activity'];
try {
    $stm = $pdo->prepare('SELECT company_name,cityname,sector_activity from company 
    INNER JOIN  address on company.id_company = address.id_company
    INNER JOIN city on address.id_city = city.id_city
    where company_name = ? and cityname= ? and sector_activity=?'); //prepared statement to verify email and password
    $stm->bindParam(1, $name);
    $stm->bindParam(2, $location);
    $stm->bindParam(2, $sector);
    $stm->execute();
    $row = $stm->fetchAll();
    if (isset($row[0]) == 1) {
        header('Location: ../companies.php');
        $_SESSION['company_name'] = $name; //if password and mail are a valid couple, grant access by setting session email value
        $_SESSION['location'] = $location;
        $_SESSION['sector_activity'] = $sector; 
    } else { //if password and mail are not a valid couple, returns error code 1
        header('Location: ../login.php?error=1');
    }
} catch (\PDOException $e) {
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}
?>