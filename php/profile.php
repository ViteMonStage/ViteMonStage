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

//Checks if there is an id sent via url and if the user has permissions to see it 
if (isset($_GET['id_user'])&& (($_SESSION['role']==4))){
    $id_user=$_GET['id_user'];
    
}
elseif(isset($_GET['id_user'])&& (($_SESSION['role']==3))&& ($_GET['id_role']!=3)) {
    $id_user=$_GET['id_user'];
    
}
elseif(isset($_GET['id_user'])&& (($_SESSION['role']==5))&& ($_GET['id_role']==5)) {
    $id_user=$_GET['id_user'];
    
}



// elseif(isset($_GET['id_user'])&& (($_SESSION['role']==2)){
//     if($_GET['id_role']==1 && )
// }
else{
//Get id value stored in the session
$id_user = $_SESSION['id_user'];

if (isset($_GET['id_role']) && $_SESSION['role'] == 2){
    if ($_GET['id_role']== 2   && $_SESSION['search_delegate'] == 0 && $_SESSION['modify_delegate'] == 0) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('./error/403.php', TRUE);
        die($contents);
    }
    else if ($_GET['id_role']==1    && $_SESSION['search_student'] == 0 && $_SESSION['modify_student'] == 0) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('./error/403.php', TRUE);
        die($contents);
    }
    else if ($_GET['id_role']==5    && $_SESSION['search_company'] == 0 && $_SESSION['modify_company'] == 0) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('./error/403.php', TRUE);
        die($contents);
    }
    else if ($_GET['id_role']==3    && $_SESSION['search_pilot'] == 0 && $_SESSION['modify_pilot'] == 0) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('./error/403.php', TRUE);
        die($contents);
    }
    else if ($_GET['id_role']==1 && $_SESSION['stats_student'] == 0) {
        header('HTTP/1.1 403 Unauthorized');
        $contents = file_get_contents('./error/403.php', TRUE);
        die($contents);
    }
}
}
$sql->bindParam(':id_user', $id_user);
$sql->execute();
$row = $sql->fetchAll();
$id_user = $row[0][8];
$birthday = $row[0][11];
}
catch(\PDOException $e){
    echo $e->getMessage();
    echo "     ";
    echo(int)$e->getCode();
}
//Sets variables if a file is loaded
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
    $id_user =$_POST['id_user'];
    
    
    
    try{
        //Checks if there is a missing input filled and sends an error notification to the user
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
        if($_SESSION['role']== 3 || $_SESSION['role'] == 1 || $_SESSION['role'] == 5){
            $sqlid= $pdo->prepare("SELECT id_role from user where id_user = ?");
            $sqlid->bindParam(1,$id_user);
            $sqlid->execute();
            $sqlid->fetchAll();
            $rowid=$sqlid;
            if($rowid[0][0] == 3  ){
                header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php?errorinputs=3');
                die();
            }

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
                                    where id_user = ? ");

$sqlu->bindParam(1,$surname);
$sqlu->bindParam(2,$name);
$sqlu->bindParam(3,$gender);
$sqlu->bindParam(4,$email);
$sqlu->bindParam(5,$birthday);
$sqlu->bindParam(6,$promotion);
$sqlu->bindParam(7,$campus);
$sqlu->bindParam(8,$id_user);
$sqlu->execute();
move_uploaded_file($tmpName,'../assets/user_data/avatar/'.$id_user.'.png');
header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php?id_user='.$id_user); //if exception , returns error code 1
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
    if (isset($_GET['id_user'])){
        $id_user=$_GET['id_user'];
    }
    else{
    //Get email value stored in the session
    $id_user = $_SESSION['id_user'];
    }
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
                                where user.id_user = (:id_user)
                                limit 5");
    $sqlwish->bindParam(':id_user',$id_user);
    $sqlwish->execute();
    $roww = $sqlwish ->fetchAll();
    if (isset($roww[0])== 1){
        foreach ($roww as $value) :?>
            <div class='offerexample'>
            <a href='../offers_detail.php?id_offer=<?php echo $value[2] ?>' class='medium'><?php echo $value[3]?></a>
            <a href='/companies_detail.php?id_company=<?php echo $value[5] ?>' class='small'><?php echo $value[6]?></a>
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
    else {
        ?>
        <div class='offerexample medium'>
        No offers added to wishlist.
        Your wishlist is empty :( 
        </div>
        <?php
    }
}

catch(\PDOException $e){
    echo $e->getMessage();
    echo "  ";
    echo (int)$e->getCode();
}
}

function loadCandidatures(){
    try{
        include "db.php";
        include "candidature.php";
        if (isset($_GET['id_user'])){
            $id_user=$_GET['id_user'];
        }
        else{
        //Get email value stored in the session
        $id_user = $_SESSION['id_user'];
        }
        $sqlcand = $pdo->prepare("  SELECT candidature.id_candidature, 
                                                        user.id_user, 
                                                        progress.id_progress, 
                                                        candidature.id_statut, 
                                                        name, 
                                                        offer_name, 
                                                        company.company_name, 
                                                        offers.description,
                                                        city.id_city, 
                                                        cityname, 
                                                        sector_activity,
                                                        offer_date 
                                    FROM 8aah0fCXko.candidature
                                    INNER JOIN user on candidature.id_user = user.id_user
                                    INNER JOIN progress on candidature.id_candidature = progress.id_candidature
                                    INNER JOIN status on candidature.id_statut=status.id_statut
                                    INNER JOIN offers on offers.id_offer=candidature.id_offer
                                    INNER JOIN company on company.id_company=offers.id_company
                                    INNER JOIN address on company.id_company=address.id_company
		                            INNER JOIN city on city.id_city=address.id_city
                                    where user.id_user = (:id_user)
                                    limit 5");
    $sqlcand->bindParam(':id_user',$id_user);
    $sqlcand->execute();
    $rowc = $sqlcand ->fetchAll();

    if (isset($rowc[0])== 1){
        foreach ($rowc as $value) :?>
            <div class="offerexample">
                            <div class="medium"><?php echo $value[5]?></div>
                            <div class="small"><?php echo $value[6]?></div>
                            <p class="mini">Progress status : <?php echo $value[4] ?> </p>
                            <!-- PROGRESS BAR -->
                            <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo toPercent(getStep($value[0])); ?>%"><?php echo getStep($value[0]) ?>/6</div>
                            </div>
                            <p class="mini"><?php echo $value[7]?>
                            </p>
                            <ul class="list mini">
                                <li id="ccity"><?php echo $value[9]?></li>
                                <li class="dot">-</li>
                                <li id="cpublishDate"><?php echo $value[11]?></li>
                                <li class="dot">-</li>
                                <li id="csector"><?php echo $value[10]?></li>
                            </ul>

        </div> <?php endforeach;
    }
    else {
        ?>
        <div class='offerexample medium'>
        You have no current application.
        </div>
        <?php
    }
}
    catch(\PDOException $e){
        echo $e->getMessage();
        echo "  ";
        echo (int)$e->getCode();
    }





}
?>