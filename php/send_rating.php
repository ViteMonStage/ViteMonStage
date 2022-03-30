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

$workingenvironnementratin = $_POST["working-environnement-rating"];
$workingconditionsrating = $_POST["working-conditions-rating"];
$wagerating = $_POST["wage-rating"];
$acquiredexperiencerating = $_POST["acquired-experience-rating"];
$supervisionqualityrating = $_POST["supervision-quality-rating"];
$description = $_POST["desctbx"];
$id_company = $_GET["id_company"];

try {
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $stm = $pdo->prepare('INSERT INTO evaluation (working_environnement, working_condition, wage, acquired_experience, supervision_quality, description, id_user, id_company) VALUES (?,?,?,?,?,?,?,?)'); //prepared statement to verify email and password
    $stm->bindParam(1, $workingenvironnementratin);
    $stm->bindParam(2, $workingconditionsrating);
    $stm->bindParam(3, $wagerating);
    $stm->bindParam(4, $acquiredexperiencerating);
    $stm->bindParam(5, $supervisionqualityrating);
    $stm->bindParam(6, $description);
    $stm->bindParam(7, $_SESSION["id_user"]);
    $stm->bindParam(8, $id_company);
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
    $sql = $pdo->prepare('SELECT * FROM 8aah0fCXko.evaluation WHERE id_user=? AND id_company=?');
    $sql->bindParam(1, $id_user); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->bindParam(2, $id_company); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->execute(); // Execution of the request 
    $row = $sql->fetchAll(); // Retrieves the rows of the query
    if (isset($row[0]) > 0) {
        return true;
    }
    return false;
}
