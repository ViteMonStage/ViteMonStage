<?php


if(isset($_POST['submit'])){
    $searchuser_param = $_POST['Status'];
    $usersearch = $_POST['search_user'];
    header('Location: ../search_user.php?Status='.$searchuser_param.'&usersearch='.$usersearch.'');
}


//include "./php/db.php"; //Used to get global pdo
session_start();

function count_user(){
    global $pdo;
    $sql = ('SELECT count(id_user) FROM 8aah0fCXko.user;');
    $res = $pdo->query($sql);
    $count = $res->fetchColumn();
    return "$count results";
}



function displayUser()
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo
        if(isset($_GET['usersearch'])){$usersearch = $_GET['usersearch'];}else $usersearch = "";
        if(isset($_GET['Status'])){$searchuser_param = $_GET['Status'];}else $searchuser_param = "";
        $sql = $pdo->prepare("SELECT id_user,firstname,lastname,description_user,promotion.promotion_name,role.role,campus.campus_name,user.email from user 
        inner join promotion on user.id_promotion = promotion.id_promotion
        inner join role on user.id_role = role.id_role
		inner join campus on user.id_campus = campus.id_campus
        WHERE concat(firstname,' ',lastname) like '%$usersearch%' $searchuser_param");
        $sql->execute();
        $row = $sql->fetchAll();
        $rownum = $sql->rowCount();

        ?>
        <p class="search-results-count small">number of results : <?php echo $rownum ?></p>
        <?php

            foreach ($row as $value) {

                echo "<section class='search-result-item'>";
                $profile_pic = "./assets/user_data/avatar/$value[0].png";
                if(file_exists($profile_pic)){
                    echo"<a class='image-link' href='./profile_user.php?e-mail=$value[7]'><img class='image' src='./assets/user_data/avatar/$value[0].png'>";
                }else{
                    echo"<a class='image-link' href='./profile_user.php?e-mail=$value[7]'><img class='image' src='./assets/user_data/avatar/0.png'>";
                }
                echo"</a>
                <div class='search-result-item-body'>
                    <div class='row'>
                        <div class='col-sm-9'>
                            <h4 class='search-result-item-heading'><a href='./profile_user.php?e-mail=$value[7]'>$value[1] $value[2]</a></h4>
                            <p class='info'> class : $value[4] / Status : $value[5] / campus : $value[6]</p>
                            <p class='description'> $value[3]</p>
                        </div>
                        <div class='col-sm-3 text-align-center'>
                            <a class='col-sm-10 btn btn-secondary ' href='./profile_user.php?e-mail=$value[7]'>See profile</a>
                            <a class='col-sm-10 btn btn-secondary' href='#'>Manage rights</a>
                        </div>
                    </div>
                </div>
            </section>";
            }
    } catch (\PDOException $e) {
        echo $e->getMessage();
        echo "   ";
        echo (int)$e->getCode();
    }
}

/*
function get_user($search_status, $search, bool $pagination){

    //limit show user
    $limit = 10;

    //total number of users
    $select_count = "SELECT count(id_user) FROM 8aah0fCXko.user;";

    //number of page needed
    $numlink = ceil($select_count/$limit);

    //initial offset
    $starting_limit = ($page-1)*$limit;

    $select_data = "SELECT user.firstname, user.lastname, user.id_role, user.id_promotion, user.description_user";
    switch ($search_status) {
        case '1':
            return $search_status = "*";
            break;
        case '2':
            return $search_status = "id_role(1)"; //student
            break;
        case '3':
            return $search_status = "id_role(2)"; //Delegate
            break;
        case '4':
            return $search_status = "id_role(3)"; //Pilote
            break;
        case '5':
            return $search_status = "id_role(4)"; //administrator
            break;
        case '6':
            return $search_status = "id_role(5)"; //company Representative
            break;
    }
    
    $order_limit = "ORDER BY id_user DESC LIMIT $starting_limit, $limit";

    if($pagination == true){
        for ($i=1;$i<=$numlinks;$i++){
            echo "<li class='page-item'><a class='page-link' href='search_user.php?page=$i'>$i</a></li>";
            /*
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                    
                ?>;
            </ul>
        </nav>
        <?php
    }
}

/*<!--section class="search-result-item">
    <a class="image-link" href="#"><img class="image" src="https://bootdey.com/img/Content/avatar/avatar1.png">
    </a>
    <div class="search-result-item-body">
        <div class="row">
            <div class="col-sm-9">
                <h4 class="search-result-item-heading"><a href="#">Florian SAVALLE</a></h4>
                <p class="info">Student</p>
                <p class="description"> description</p>
            </div>
            <div class="col-sm-3 text-align-center">
                <a class="col-sm-10 btn btn-secondary" href="#">See profile</a>
                <a class="col-sm-10 btn btn-secondary" href="#">Manage rights</a>
            </div>
        </div>
    </div>
</section-->
}*/

/*if (isset($_POST['submit'])){
    $
}*/