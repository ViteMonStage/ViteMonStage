<?php
if(!isset($_GET["id_offer"])){
    header('HTTP/1.0 404 Not Found');
    $contents = file_get_contents('../error/404.php', TRUE);
    exit($contents);
}

if(isset($_FILES['motivationLetterFile'])){
    $tmpName = $_FILES['motivationLetterFile']['tmp_name'];
    $fname = $_FILES['motivationLetterFile']['name'];
    $fsize = $_FILES['motivationLetterFile']['size'];
    $ferror = $_FILES['motivationLetterFile']['error'];
    move_uploaded_file($tmpName, '../assets/user_data/motivation_letter/'.$fname);
}

if(isset($_FILES['resumeFile'])){
    $tmpName = $_FILES['resumeFile']['tmp_name'];
    $fname = $_FILES['resumeFile']['name'];
    $fsize = $_FILES['resumeFile']['size'];
    $ferror = $_FILES['resumeFile']['error'];
    $array = explode('.', $fname);
    $extension = end($array);
    move_uploaded_file($tmpName, '../assets/user_data/validation_sheet/'.$fname);
}



?>