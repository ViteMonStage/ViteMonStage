<?php
session_start();


if (!isset($_GET["id_offer"])) {
    header('HTTP/1.0 404 Not Found');
    $contents = file_get_contents('../error/404.php', TRUE);
    exit($contents);
}

if (!isset($_SESSION["id_user"])) {
    header('HTTP/1.1 403 Unauthorized');
    $contents = file_get_contents('../error/403.php', TRUE);
    die($contents);
}

if (!isset($_FILES['resumeFile']) || !isset($_FILES['motivationLetterFile'])) {
    header('HTTP/1.1 403 Unauthorized');
    $contents = file_get_contents('../error/403.php', TRUE);
    die($contents);
}

$tmpName1 = $_FILES['motivationLetterFile']['tmp_name'];
$fname1 = $_FILES['motivationLetterFile']['name'];
$fsize1 = $_FILES['motivationLetterFile']['size'];
$ferror1 = $_FILES['motivationLetterFile']['error'];
$array1 = explode('.', $fname1);
$extension1 = end($array1);
move_uploaded_file($tmpName1, '../assets/user_data/motivation_letter/' . $_GET["id_offer"] . "_" . $_SESSION["id_user"] . "." . $extension1);


$tmpName2 = $_FILES['resumeFile']['tmp_name'];
$fname2 = $_FILES['resumeFile']['name'];
$fsize2 = $_FILES['resumeFile']['size'];
$ferror2 = $_FILES['resumeFile']['error'];
$array2 = explode('.', $fname2);
$extension2 = end($array1);
move_uploaded_file($tmpName2, '../assets/user_data/validation_sheet/' . $_GET["id_offer"] . "_" . $_SESSION["id_user"] . "." . $extension2);

$id_progress = 0;

try{
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $sql = $pdo->prepare('INSERT INTO progress (step1, step2, step3, step4, step5, step6, id_candidature) VALUES
    (?,?,?,?,?,?,?)');
    $time = date('Y-m-d', time());
    $null = NULL;
    $sql->bindParam(1, $time);
    $sql->bindParam(2, $null);
    $sql->bindParam(3, $null);
    $sql->bindParam(4, $null);
    $sql->bindParam(5, $null);
    $sql->bindParam(6, $null);
    $sql->bindParam(7, $null);
    $sql->execute();
    $id_progress = $pdo->lastInsertId();
}catch(Exception $e){
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}
$id_candidature = 0;

try {
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $sql = $pdo->prepare('INSERT INTO candidature (cv, motivation_letter, validation_sheet, internship_agreement, id_user, id_offer, id_progress, id_statut) VALUES
    (?,?,?,?,?,?,?,?)');
    $val1 = $_GET["id_offer"] . "_" . $_SESSION["id_user"] . "." . $extension1;
    $val2 = $_GET["id_offer"] . "_" . $_SESSION["id_user"] . "." . $extension2;
    $null = NULL;
    $val8 = 1;
    $sql->bindParam(1, $val1);
    $sql->bindParam(2, $val2);
    $sql->bindParam(3, $null);
    $sql->bindParam(4, $null);
    $sql->bindParam(5, $_SESSION['id_user']);
    $sql->bindParam(6, $_GET['id_offer']);
    $sql->bindParam(7, $id_progress);
    $sql->bindParam(8, $val8);
    $sql->execute(); // Execution of the request 
    $id_candidature = $pdo->lastInsertId();
} catch (\PDOException $e) { // displays an error if the try fails
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}

try {
    include dirname(__FILE__) . "/db.php"; //Used to get global pdo
    $sql = $pdo->prepare("UPDATE progress SET id_candidature = ? WHERE id_progress=?");
    $sql->bindParam(1, $id_candidature);
    $sql->bindParam(2, $id_progress);
    $sql->execute(); // Execution of the request
} catch (\PDOException $e) { // displays an error if the try fails
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}

header('Location: ../offers_detail.php?id_offer='.$_GET['id_offer'].'&success=true');