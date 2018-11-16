<?php
	session_start();
    if($_SERVER['REQUEST_METHOD'] != "GET") {
        header("Location: http://localhost/tp3/signin.php");
        exit;
    }
    if(!isset($_SESSION['user'])) {
        header("Location: http://localhost/tp3/signin.php");
        exit;
    }
	//  on affiche la page de bienvenue
    if(isset($_SESSION["message"]))
            {
                echo "<div class='message'>".$_SESSION["message"]."</div>";
                unset ($_SESSION["message"]);
            } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>mon compte</title>
    </head>
    <body>
        <p>
			Bonjour <?php echo " " . $_SESSION['user'] ?>!<br>
			bienvenu!
		</p>
        <a href="http://localhost/tp3/signout.php"><input type="button" value='Sign Out'></a>
        <br>
        <a href="http://localhost/tp3/formpassword.php"><input type="button" value='Change Password'></a>
        <br>
        <a href="http://localhost/tp3/deleteuser.php"><input type="button" value='Delete Account'></a>
    </body>
</html>
