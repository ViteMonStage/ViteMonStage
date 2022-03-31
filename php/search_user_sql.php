<?php


if(isset($_POST['submit'])){ //chech if submit buttun is clicked
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



function displayUser() //affichage des utilisateur correspondant a la rechèrche
{
    try {
        include dirname(__FILE__) . "/db.php"; //Used to get global pdo

        if(isset($_GET['usersearch'])) //get serach param
            {$usersearch = $_GET['usersearch'];
        }else $usersearch = "";
        
        if(isset($_GET['Status'])) // get search param
            {$searchuser_param = $_GET['Status'];
        }else $searchuser_param = ""; 
        
        if($searchuser_param == 0)  // modifies the variable to the correct code to not have to the sql command in the url
            {$searchuser_param = "";    // (it would give info on the database layout, not good for security)
        }else{
            $searchuser_param = "and user.id_role LIKE '$searchuser_param'";
        }
        
        if($_SESSION['role'] == 3 || $_SESSION['role'] == 2 || $_SESSION['role'] == 5)
        $sql = $pdo->prepare("SELECT id_user,firstname,lastname,description_user,promotion.promotion_name,role.role,campus.campus_name,user.email from user 
        inner join promotion on user.id_promotion = promotion.id_promotion
        inner join role on user.id_role = role.id_role
		inner join campus on user.id_campus = campus.id_campus AND user.id_role != 3 AND user.id_role != 4
        WHERE concat(firstname,' ',lastname) like '%$usersearch%' $searchuser_param"); // prepared sql command
       
       elseif($_SESSION['role'] == 4){
        $sql = $pdo->prepare("SELECT id_user,firstname,lastname,description_user,promotion.promotion_name,role.role,campus.campus_name,user.email from user 
        inner join promotion on user.id_promotion = promotion.id_promotion
        inner join role on user.id_role = role.id_role
		inner join campus on user.id_campus = campus.id_campus
        WHERE concat(firstname,' ',lastname) like '%$usersearch%' $searchuser_param"); // prepared sql command
       }
        $sql->execute(); //execute the command
        $row = $sql->fetchAll(); //fetch the info
        $rownum = $sql->rowCount();//Counts the command rows



        ?>
        <p class="search-results-count small">number of results : <?php echo $rownum //outputs the number of results ?></p> 
        <?php
            foreach ($row as $value) {

                echo "<section class='search-result-item border'>";
                $profile_pic = "./assets/user_data/avatar/$value[0].png"; //path of the profile pictures to check if they exist
                if(file_exists($profile_pic)){ 
                    echo"<a class='image-link' href='./profile_user.php?id_user=$value[0]'><img class='image' src='./assets/user_data/avatar/$value[0].png'>"; //if the picture exists output this
                }else{
                    echo"<a class='image-link' href='./profile_user.php?id_user=$value[0]'><img class='image' src='./assets/user_data/avatar/0.png'>"; //if the picture dosen't exists output this
                }
                echo"</a>
                    <div class='search-result-item-body'>
                        <div class='row'>
                            <div class='col-sm-9'>
                                <h4 class='search-result-item-heading'><a href='./profile_user.php?id_user=$value[0]'>$value[1] $value[2]</a></h4> "/*show the user name and if clicked redirect to the profile of the user*/; echo"
                                <p class='info'> class : $value[4] / Status : $value[5] / campus : $value[6]</p> "/**/; echo"
                                <p class='description'> $value[3]</p> "/*The description of the user*/; echo"
                            </div>
                            <div class='col-sm-3 text-align-center'>
                                <a class='col-sm-10 btn btn-secondary ' href='./profile_user.php?id_user=$value[0]'>See profile</a> "/*if clicked redirect to the profile of the user*/; echo"
                                "/*<a class='col-sm-10 btn btn-secondary' href='./profile_user.php?id_user=$value[7]'>Manage rights</a> if clicked redirect to the profile of the user*/; echo"
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

    //limit show user pagination
    $limit = 10;

    //total number of users
    $select_count = "SELECT count(id_user) FROM 8aah0fCXko.user;";

    //number of page needed
    $numlink = ceil($select_count/$limit);

    //initial offset
    $starting_limit = ($page-1)*$limit;
    
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