<?php
    session_start();
    session_destroy();
    session_start();
    $_SESSION['message'] = "";
    header('location: login.php');
    exit;
?>
