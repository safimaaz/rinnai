<?php 
    session_start();
    unset($_SESSION['mail']);
    echo "<script>window.open('login.php','_self')</script>";
    
?>