<?php
session_start(); //Start session
session_destroy(); //Destroy it to erase session data
header('Location: ../login.php'); //Go back to login page
?>