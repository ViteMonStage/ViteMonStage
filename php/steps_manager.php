<?php

session_start();
$id_user = 0;
if (!isset($_GET["id_user"])) {
    $id_user = $_SESSION["id_user"];
} else {
    $id_user = $_GET["id_user"];
}

function incrementStep($steptype, $id_candidature)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('UPDATE progress SET ' . $steptype . ' = ? WHERE id_candidature=?');
        $date = date('Y-m-d', time());
        $sql->bindParam(1, $date);
        $sql->bindParam(2, $id_candidature);
        $sql->execute(); // Execution of the request 
        $row = $sql->fetchAll(); // Retrieves the rows of the query
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function cancelCandidature($id_candidature)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('UPDATE candidature SET id_statut = ? WHERE id_candidature=?');
        $val1 = 2;
        $sql->bindParam(1, $val1);
        $sql->bindParam(2, $id_candidature);
        $sql->execute(); // Execution of the request
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

function acceptCandidature($id_candidature)
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        $sql = $pdo->prepare('UPDATE candidature SET id_statut = ? WHERE id_candidature=?');
        $val1 = 1;
        $sql->bindParam(1, $val1);
        $sql->bindParam(2, $id_candidature);
        $sql->execute(); // Execution of the request
    } catch (\PDOException $e) { // displays an error if the try fails
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}



if (!isset($_GET["id_offer"]) || !isset($_GET["operation"])) {
    header('HTTP/1.1 403 Unauthorized');
    $contents = file_get_contents('../error/403.php', TRUE);
    die($contents);
}

function getCandidatureId($id_user)
{
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $sql = $pdo->prepare('SELECT * FROM candidature WHERE id_user=? AND id_offer=?');
    $sql->bindParam(1, $id_user); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->bindParam(2, $_GET["id_offer"]); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->execute(); // Execution of the request 
    $row = $sql->fetchAll(); // Retrieves the rows of the query
    print_r($row[0][0]);
    return $row[0][0];
}

try {
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $id_candidature = getCandidatureId($id_user);
    $sql = $pdo->prepare('SELECT * FROM candidature INNER JOIN progress ON candidature.id_progress=progress.id_progress WHERE id_user = ? AND candidature.id_candidature=?;');
    $sql->bindParam(1, $id_user); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->bindParam(2, $id_candidature); // Assigning the id_offer parameter in the request and retrieving it from the url
    $sql->execute(); // Execution of the request 
    $row = $sql->fetchAll(); // Retrieves the rows of the query
    if ($_GET["operation"] == "up") {
        if (is_null($row[0][11])) {
            incrementStep("step2", $row[0][0]);
        } else if (is_null($row[0][12])) {
            incrementStep("step3", $row[0][0]);
        } else if (is_null($row[0][13])) {
            incrementStep("step4", $row[0][0]);
        } else if (is_null($row[0][14])) {
            incrementStep("step5", $row[0][0]);
        } else if (is_null($row[0][15])) {
            incrementStep("step6", $row[0][0]);
            acceptCandidature($id_candidature);
        }
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/offers_detail.php?id_offer=' . $_GET["id_offer"] . '&success=2');
    } else if ($_GET["operation"] == "cancel") {
        cancelCandidature($id_candidature);
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/offers_detail.php?id_offer=' . $_GET["id_offer"] . '&success=3');
    }
} catch (\PDOException $e) { // displays an error if the try fails
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}