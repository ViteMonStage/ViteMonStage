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
                            id_user,
                            promotion.id_promotion,
                            user.id_campus
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
$pattern = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
if(isset($_POST['postbutton'])){
    try{
        if(empty($_POST['surname'])|| empty($_POST['name'])|| empty($_POST['gender'])|| empty($_POST['email'])
        || !preg_match($pattern,$_POST['birthday'])|| empty($_POST['campus'])){
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php?errorinputs=1');
        }
        else{
            if ($_POST['promotion']=='NULL'){
                $_POST['promotion'] =NULL;
            }

        
$surname = $_POST['surname'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$promotion = $_POST['promotion'];
$campus = $_POST['campus'];
        


$sqlu = $pdo->prepare("UPDATE user
                                SET lastname = ?,
                                    firstname = ?,
                                    gender = ?,
                                    email = ?,
                                    birthday =?,
                                    id_promotion = ?,
                                    id_campus = ?
                                    where id_user = ? ; ");

$sqlu->bindParam(1,$surname);
$sqlu->bindParam(2,$name);
$sqlu->bindParam(3,$gender);
$sqlu->bindParam(4,$email);
$sqlu->bindParam(5,$birthday);
$sqlu->bindParam(6,$promotion);
$sqlu->bindParam(7,$campus);
$sqlu->bindParam(8,$id);
$sqlu->execute();

header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php'); //if exception , returns error code 1
    }
    }
catch(\PDOException $e){
    echo $e->getMessage();
    echo "     ";
    echo(int)$e->getCode();
}
}
?>