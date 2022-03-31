<?php
include "./db.php"; //Used to get global pdo
session_start();

if (isset($_POST['check_sub'])) {
    $id_user = $_GET['id_user'];
    echo $_GET['id_user'];
    for($i = 0; $i <= 24 ; $i++)
    {
        if(isset($_POST['c'.$i]))
        {
            switch ($i) {
                case 1:
                    $stm = $pdo->prepare('UPDATE permission SET search_company = "1" WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 2:
                    $stm = $pdo->prepare('UPDATE permission SET create_company = "1" WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 3:
                    $stm = $pdo->prepare('UPDATE permission SET modify_company = "1" WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 4:
                    $stm = $pdo->prepare('UPDATE permission SET evaluate_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 5:
                    $stm = $pdo->prepare('UPDATE permission SET delete_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 6:
                    $stm = $pdo->prepare('UPDATE permission SET stats_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 7:
                    $stm = $pdo->prepare('UPDATE permission SET search_offer = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 8:
                    $stm = $pdo->prepare('UPDATE permission SET create_offer = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 9:
                    $stm = $pdo->prepare('UPDATE permission SET modify_offer = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 10:
                    $stm = $pdo->prepare('UPDATE permission SET delete_offer = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 11:
                    $stm = $pdo->prepare('UPDATE permission SET stats_offer = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 12:
                    $stm = $pdo->prepare('UPDATE permission SET search_pilot = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 13:
                    $stm = $pdo->prepare('UPDATE permission SET create_pilot = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 14:
                    $stm = $pdo->prepare('UPDATE permission SET modify_pilot = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 15:
                    $stm = $pdo->prepare('UPDATE permission SET delete_pilot = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 16:
                    $stm = $pdo->prepare('UPDATE permission SET search_delegate = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 17:
                    $stm = $pdo->prepare('UPDATE permission SET  create_delegate = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 18:
                    $stm = $pdo->prepare('UPDATE permission SET modify_delegate = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 19:
                    $stm = $pdo->prepare('UPDATE permission SET delete_delegate = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 20:
                    $stm = $pdo->prepare('UPDATE permission SET search_student = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 21:
                    $stm = $pdo->prepare('UPDATE permission SET create_student = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 22:
                    $stm = $pdo->prepare('UPDATE permission SET modify_student = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 23:
                    $stm = $pdo->prepare('UPDATE permission SET delete_student = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 24:
                    $stm = $pdo->prepare('UPDATE permission SET stats_student = TRUE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                }
        }
        else
        {
            switch ($i) {
                case 1:
                    $stm = $pdo->prepare('UPDATE permission SET search_company = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 2:
                    $stm = $pdo->prepare('UPDATE permission SET create_company = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 3:
                    $stm = $pdo->prepare('UPDATE permission SET modify_company = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 4:
                    $stm = $pdo->prepare('UPDATE permission SET evaluate_company = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 5:
                    $stm = $pdo->prepare('UPDATE permission SET delete_company = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 6:
                    $stm = $pdo->prepare('UPDATE permission SET stats_company = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 7:
                    $stm = $pdo->prepare('UPDATE permission SET search_offer = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 8:
                    $stm = $pdo->prepare('UPDATE permission SET create_offer = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 9:
                    $stm = $pdo->prepare('UPDATE permission SET modify_offer = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 10:
                    $stm = $pdo->prepare('UPDATE permission SET delete_offer = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 11:
                    $stm = $pdo->prepare('UPDATE permission SET stats_offer = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 12:
                    $stm = $pdo->prepare('UPDATE permission SET search_pilot = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 13:
                    $stm = $pdo->prepare('UPDATE permission SET create_pilot = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 14:
                    $stm = $pdo->prepare('UPDATE permission SET modify_pilot = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 15:
                    $stm = $pdo->prepare('UPDATE permission SET delete_pilot = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 16:
                    $stm = $pdo->prepare('UPDATE permission SET search_delegate = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 17:
                    $stm = $pdo->prepare('UPDATE permission SET  create_delegate = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 18:
                    $stm = $pdo->prepare('UPDATE permission SET modify_delegate = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 19:
                    $stm = $pdo->prepare('UPDATE permission SET delete_delegate = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 20:
                    $stm = $pdo->prepare('UPDATE permission SET search_student = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 21:
                    $stm = $pdo->prepare('UPDATE permission SET create_student = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 22:
                    $stm = $pdo->prepare('UPDATE permission SET modify_student = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 23:
                    $stm = $pdo->prepare('UPDATE permission SET delete_student = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                case 24:
                    $stm = $pdo->prepare('UPDATE permission SET stats_student = FALSE WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                    break;
                }
        }
    }
}