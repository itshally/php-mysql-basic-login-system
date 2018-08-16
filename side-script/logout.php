/*--------------- this file logouts the user / kills the session ---------------*/
<?php 
    session_start();
    session_unset();
    session_destroy(); 
    header('Location: ../index.php');
?>