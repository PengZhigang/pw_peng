<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/tp2/signin.php");
    exit;
?>