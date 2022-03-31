<?php

if (!isset($_SESSION)){
    session_start();
}




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
                            user.id_campus,
                            birthday
                            from user
                            INNER JOIN campus on user.id_campus = campus.id_campus
                            LEFT JOIN promotion on user.id_promotion = promotion.id_promotion 
                            LEFT JOIN promotion_type on promotion.id_promotion_type=promotion_type.id_promotion_type
                            WHERE id_user=(:id_user)");

if (isset($_GET['id_user'])){
    $id_user=$_GET['id_user'];
}
else{
//Get email value stored in the session
$id_user = $_SESSION['id_user'];

}
$sql->bindParam(':id_user', $id_user);
$sql->execute();
$row = $sql->fetchAll();
$id = $row[0][8];
$birthday = $row[0][11];
}
catch(\PDOException $e){
    echo $e->getMessage();
    echo "     ";
    echo(int)$e->getCode();
}

if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $fname = $_FILES['file']['name'];
    $fsize = $_FILES['file']['size'];
    $ferror = $_FILES['file']['error'];
}

$pattern = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
if(isset($_POST['postbutton'])){
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $promotion = $_POST['promotion'];
    $campus = $_POST['campus'];
    try{
        if(empty($surname)|| empty($name)|| empty($gender)|| empty($email)
        || !preg_match($pattern,$birthday)|| empty($campus)){
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php?errorinputs=1');
            die();
        }
        elseif((preg_match('/[\'^}{#~><>¬]/', $surname|| $name))){
            // one or more of the 'special characters' found in $string
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php?errorinputs=2'); //if a character is not valid, returns error code 2
        die();

        }
        else{
            if ($_POST['promotion']=='NULL'){
                $_POST['promotion'] =NULL;
            }

        

        


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
move_uploaded_file($tmpName,'../assets/user_data/avatar/'.$id.'.png');
header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php'); //if exception , returns error code 1
    }
    }
catch(\PDOException $e){
    echo $e->getMessage();
    echo "     ";
    echo(int)$e->getCode();
}
}
function loadWishlist(){
    try{
    include "db.php";
    $sqlwish = $pdo->prepare("  SELECT wish.id_user,
                                        user.email,
                                        wish.id_offer, 
                                        offer_name, 
                                        offer_date , 
                                        offers.id_company, 
                                        company_name, 
                                        offers.description, 
                                        city.id_city, 
                                        cityname, 
                                        sector_activity
                                FROM wish
                                INNER JOIN user on wish.id_user =user.id_user
                                INNER JOIN offers on wish.id_offer= offers.id_offer
                                INNER JOIN company on offers.id_company = company.id_company
                                INNER JOIN address on company.id_company=address.id_company
                                INNER JOIN city on city.id_city=address.id_city
                                where user.id_user = (:id_user)");
    $sqlwish->bindParam($id,':id_user');
    $sqlwish->execute();
    $roww = $sql ->fetchAll();
    if (isset($roww[0])== 1){
        foreach ($roww as $value) :?>
            <div class='offerexample'>
            <a href='' class='medium'><?php echo $value[3]?></a>
            <a href='' class='small'><?php echo $value[6]?></a>
            <p class='mini'><?php echo $value[7]?>
            </p>
            <div class='space'>
                <ul class='list mini'>
                    <li ><?php echo $value[9]?></li>
                    <li class='dot'>-</li>
                    <li ><?php echo $value[4]?></li>
                    <li class='dot'>-</li>
                    <li ><?php echo $value[10]?></li>
                </ul>
            </div>
        </div> <?php endforeach;
    }
}

catch(\PDOException $e){
    echo $e->getMessage();
    echo "  ";
    echo (int)$e->getCode();
}
}
?>