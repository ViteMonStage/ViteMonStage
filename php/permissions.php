<?php
include "./db.php"; //Used to get global pdo
session_start();

if (isset($_POST['check_sub'])) {
    for($i = 1; $i <= 24 ; $i++)
    {
        if($_POST['c'.$i.''])
        {
            switch ($i) {
                case 1:
                    $stm = $pdo->prepare('UPDATE permissions SET search_company = 1 WHERE id_user = ?'); //prepared statement to insert values
                    $stm->bindParam(1, $id_user);
                    $stm->execute();
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                case 10:
                case 11:
                case 12:
                case 13:
                case 14:
                case 15:
                case 16:
                case 17:
                case 18:
                case 19:
                case 20:
                case 21:
                case 22:
                case 23:
                case 24:
                }
        }
    }

    //header("Location: http://" . $_SERVER['HTTP_HOST'] . '/profile_user.php?c_good=1'); //if everything is good , returns good code 1
}