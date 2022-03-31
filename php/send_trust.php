<?php

session_start();
if(!isset($_GET["id_company"])){
    header('HTTP/1.1 404 Not found');
    $contents = file_get_contents('../error/404.php', TRUE);
    die($contents);
}
if (alreadySentRating($_SESSION["id_user"], $_GET["id_company"])) {
    header('HTTP/1.1 404 Not found');
    $contents = file_get_contents('../error/404.php', TRUE);
    die($contents);
}

$companytrustrating = $_POST["company-trust-rating"];
$id_company = $_GET["id_company"];

try {
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $stm = $pdo->prepare('INSERT INTO trust (pilot_trust, id_user, id_company) VALUES (?,?,?)'); //prepared statement to verify email and password
    $stm->bindParam(1, $companytrustrating);
    $stm->bindParam(2, $_SESSION["id_user"]);
    $stm->bindParam(3, $id_company);
    $stm->execute();
    $row = $stm->fetchAll();
    header('Location: ../companies_detail.php?id_company=' . $id_company);
} catch (\PDOException $e) {
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}

function alreadySentRating($id_user, $id_company)
{
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $sql = $pdo->prepare('SELECT * FROM trust WHERE id_user=? AND id_company=?');
    $sql->bindParam(1, $id_user); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->bindParam(2, $id_company); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->execute(); // Execution of the request 
    $row = $sql->fetchAll(); // Retrieves the rows of the query
    if (isset($row[0]) > 0) {
        return true;
    }
    return false;
}
