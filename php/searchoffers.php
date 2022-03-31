<?php

$name = $_POST['offer_name'];
$location = $_POST['offer_location'];
$minofferplace = $_POST['min_place_offer'];
$duration = $_POST['duration_offer'];
$promotion = $_POST['promotion'];
try {
        header('Location: ../offers.php?offer_name='.$name.'&offer_location='.$location.'&min_place_offer='.$minofferplace.'&duration_offer='.$duration.'&promotion='.$promotion);
    }
catch (\PDOException $e) {
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}
?>
