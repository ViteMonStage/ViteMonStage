<?php

if (!isset($_SESSION)){
    session_start();
}
//Get email value stored in the session
$email=$_SESSION['email']; 
include "db.php";
//Preparing the request to get the infos from the table with the corresponding email address
try{
$sql = $pdo->prepare("SELECT 
                            lastname,
                            firstname,
                            gender,
                            email,
                            timestampdiff(year,birthday,now())as age ,
                            promotion_name,
                            campus_name,
                            promotion_type,
                            id_user
                            from user
                            INNER JOIN campus on user.id_campus = campus.id_campus
                            LEFT JOIN promotion on user.id_promotion = promotion.id_promotion 
                            LEFT JOIN promotion_type on promotion.id_promotion_type=promotion_type.id_promotion_type
                            WHERE email=(:email)");
$email = $_SESSION['email'];
$sql->bindParam(':email', $email);
$sql->execute();
$row = $sql->fetchAll();
$id = $row[0][8];
}
catch(\PDOException $e){
    echo $e->getMessage();
    echo "     ";
    echo(int)$e->getCode();
}

if(isset($_POST['postbutton'])){
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $promotion = $_POST['promotion'];
    $campus = $_POST['campus'];
    $promotype = $_POST['promotype'];


$sql = $pdo->prepare("UPDATE ");
}
?>