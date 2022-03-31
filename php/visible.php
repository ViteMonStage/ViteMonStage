<?php
include "./db.php"; //Used to get global pdo
 if (isset($_POST['invisible'])) {
    $id_company = $_GET['id_company'];
    $stm = $pdo->prepare('SELECT visible FROM company WHERE id_company = ?'); //query to get company ids and their name
    $stm -> bindParam(1, $id_company);
    $stm->execute();
    $row = $stm->fetchAll();
    $visible = $row[0][0];
    if ($visible == 1){
        $stm = $pdo->prepare('UPDATE company set visible= 0 WHERE id_company = ?'); //query to get company ids and their name
        $stm -> bindParam(1, $id_company);
        $stm->execute();
        header("Location: http://" . $_SERVER['HTTP_HOST'] .  '/companies_detail.php?id_company='.$id_company.'&isvisible=0'); //if textbox is left empty
        die();
    } 
    elseif ($visible == 0){
        $stm = $pdo->prepare('UPDATE company set visible= 1 WHERE id_company = ?'); //query to get company ids and their name
        $stm -> bindParam(1, $id_company);
        $stm->execute();
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/companies_detail.php?id_company=' .$id_company.'&isvisible=1'); //if textbox is left empty
        die();
    } 
   
}
?>