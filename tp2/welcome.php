<?php
	session_start();
    if($_SERVER['REQUEST_METHOD'] != "GET") header("Location: http://localhost/tp2/signin.php");
    if(!isset($_SESSION[$_GET["login"]])) header("Location: http://localhost/tp2/signin.php");
	// sinon, on affiche la page de bienvenue
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My account</title>
    </head>
    <body>
        <p>
			bonjour <?php echo " " . $_GET["login"] ?>!<br>
			bienvenu 
		</p>
        <a href="http://localhost/tp2/signout.php"><input type="button" value='Signout'></a>
    </body>
</html>
