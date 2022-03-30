<?php

$name = $_POST['company_name'];
$location = $_POST['location'];
$sector = $_POST['sector_activity'];
try {
        header('Location: ../companies.php?company_name='.$name.'&location='.$location.'&sector_activity='.$sector);
    }
catch (\PDOException $e) {
    echo $e->getMessage();
    echo "   ";
    echo (int)$e->getCode();
}
?>
