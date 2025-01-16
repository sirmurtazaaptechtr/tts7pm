<?php
    include('connection.inc.php');
    unset($_SESSION['user_login']);
    header('Location:login.php');
    exit();
?>