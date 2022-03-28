<?php //Checks if email is set in session and if not, instantly redirects to login page (imported in navbar which is imported in each regular page itself)
if(!isset($_SESSION)) {
    session_start(); 
}
if(!isset($_SESSION['email'])){
    header('Location: ../login.php');
}
?>