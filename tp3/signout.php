<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/tp3/signin.php");
    exit;
?>