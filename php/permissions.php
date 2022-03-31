<?php
include "./db.php"; //Used to get global pdo
session_start();


if (isset($_POST['check_sub'])) {
    $id_user = $_GET['id_user'];
    echo $_GET['id_user'];
    $stm = $pdo->prepare('SELECT id_role FROM user WHERE id_user = ?'); //query to get company ids and their name
    $stm -> bindParam(1, $id_user);
    $stm->execute();
    $row = $stm->fetchAll();
    $id_role = $row[0][0];
    for($i = 0; $i <= 24 ; $i++)
    {
        if(isset($_POST['c'.$i]))
        {
            switch ($i) {
                case 1:
                    $stm = $pdo->prepare('UPDATE permission SET search_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_company'] = 1;
                    break;
                case 2:
                    $stm = $pdo->prepare('UPDATE permission SET create_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_company'] = 1;
                    break;
                case 3:
                    $stm = $pdo->prepare('UPDATE permission SET modify_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_company'] = 1;
                    break;
                case 4:
                    $stm = $pdo->prepare('UPDATE permission SET evaluate_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['evaluate_company'] = 1;
                    break;
                case 5:
                    $stm = $pdo->prepare('UPDATE permission SET delete_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_company'] = 1;
                    break;
                case 6:
                    $stm = $pdo->prepare('UPDATE permission SET stats_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['stats_company'] = 1;
                    break;
                case 7:
                    $stm = $pdo->prepare('UPDATE permission SET search_offer = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_offer'] = 1;
                    break;
                case 8:
                    $stm = $pdo->prepare('UPDATE permission SET create_offer = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_offer'] = 1;
                    break;
                case 9:
                    $stm = $pdo->prepare('UPDATE permission SET modify_offer = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_offer'] = 1;
                    break;
                case 10:
                    $stm = $pdo->prepare('UPDATE permission SET delete_offer = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_offer'] = 1;
                    break;
                case 11:
                    $stm = $pdo->prepare('UPDATE permission SET stats_offer = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['stats_offer'] = 1;
                    break;
                case 12:
                    $stm = $pdo->prepare('UPDATE permission SET search_pilot = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_pilot'] = 1;
                    break;
                case 13:
                    $stm = $pdo->prepare('UPDATE permission SET create_pilot = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_pilot'] = 1;
                    break;
                case 14:
                    $stm = $pdo->prepare('UPDATE permission SET modify_pilot = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_pilot'] = 1;
                    break;
                case 15:
                    $stm = $pdo->prepare('UPDATE permission SET delete_pilot = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_pilot'] = 1;
                    break;
                case 16:
                    $stm = $pdo->prepare('UPDATE permission SET search_delegate = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_delegate'] = 1;
                    break;
                case 17:
                    $stm = $pdo->prepare('UPDATE permission SET  create_delegate = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_delegate'] = 1;
                    break;
                case 18:
                    $stm = $pdo->prepare('UPDATE permission SET modify_delegate = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_delegate'] = 1;
                    break;
                case 19:
                    $stm = $pdo->prepare('UPDATE permission SET delete_delegate = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_delegate'] = 1;
                    break;
                case 20:
                    $stm = $pdo->prepare('UPDATE permission SET search_student = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_student'] = 1;
                    break;
                case 21:
                    $stm = $pdo->prepare('UPDATE permission SET create_student = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_student'] = 1;
                    break;
                case 22:
                    $stm = $pdo->prepare('UPDATE permission SET modify_student = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_student'] = 1;
                    break;
                case 23:
                    $stm = $pdo->prepare('UPDATE permission SET delete_student = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_student'] = 1;
                    break;
                case 24:
                    $stm = $pdo->prepare('UPDATE permission SET stats_student = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['stats_student'] = 1;
                    break;
                }
        }
        else
        {
            switch ($i) {
                case 1:
                    $stm = $pdo->prepare('UPDATE permission SET search_company = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_company'] = 0;
                    break;
                case 2:
                    $stm = $pdo->prepare('UPDATE permission SET create_company = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_company'] = 0;
                    break;
                case 3:
                    $stm = $pdo->prepare('UPDATE permission SET modify_company = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_company'] = 0;
                    break;
                case 4:
                    $stm = $pdo->prepare('UPDATE permission SET evaluate_company = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['evaluate_company'] = 0;
                    break;
                case 5:
                    $stm = $pdo->prepare('UPDATE permission SET delete_company = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_company'] = 0;
                    break;
                case 6:
                    $stm = $pdo->prepare('UPDATE permission SET stats_company = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['stats_company'] = 0;
                    break;
                case 7:
                    $stm = $pdo->prepare('UPDATE permission SET search_offer = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_offer'] = 0;
                    break;
                case 8:
                    $stm = $pdo->prepare('UPDATE permission SET create_offer = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_offer'] = 0;
                    break;
                case 9:
                    $stm = $pdo->prepare('UPDATE permission SET modify_offer = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_offer'] = 0;
                    break;
                case 10:
                    $stm = $pdo->prepare('UPDATE permission SET delete_offer = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_offer'] = 0;
                    break;
                case 11:
                    $stm = $pdo->prepare('UPDATE permission SET stats_offer = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['stats_offer'] = 0;
                    break;
                case 12:
                    $stm = $pdo->prepare('UPDATE permission SET search_pilot = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_pilot'] = 0;
                    break;
                case 13:
                    $stm = $pdo->prepare('UPDATE permission SET create_pilot = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_pilot'] = 0;
                    break;
                case 14:
                    $stm = $pdo->prepare('UPDATE permission SET modify_pilot = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_pilot'] = 0;
                    break;
                case 15:
                    $stm = $pdo->prepare('UPDATE permission SET delete_pilot = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_pilot'] = 0;
                    break;
                case 16:
                    $stm = $pdo->prepare('UPDATE permission SET search_delegate = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_delegate'] = 0;
                    break;
                case 17:
                    $stm = $pdo->prepare('UPDATE permission SET  create_delegate = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_delegate'] = 0;
                    break;
                case 18:
                    $stm = $pdo->prepare('UPDATE permission SET modify_delegate = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_delegate'] = 0;
                    break;
                case 19:
                    $stm = $pdo->prepare('UPDATE permission SET delete_delegate = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_delegate'] = 0;
                    break;
                case 20:
                    $stm = $pdo->prepare('UPDATE permission SET search_student = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['search_student'] = 0;
                    break;
                case 21:
                    $stm = $pdo->prepare('UPDATE permission SET create_student = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['create_student'] = 0;
                    break;
                case 22:
                    $stm = $pdo->prepare('UPDATE permission SET modify_student = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['modify_student'] = 0;
                    break;
                case 23:
                    $stm = $pdo->prepare('UPDATE permission SET delete_student = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['delete_student'] = 0;
                    break;
                case 24:
                    $stm = $pdo->prepare('UPDATE permission SET stats_student = 0 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    $_SESSION['stats_student'] = 0;
                    break;
                }
        }
    }
    header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php?id_user='.$id_user.'&id_role='.$id_role); //if textbox is left empty
    die();
}