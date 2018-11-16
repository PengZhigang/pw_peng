<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] != "GET") header("Location: http://localhost/tp3/signin.php");
	if(isset($_SESSION["message"]))
            {
                echo "<div class='message'>".$_SESSION["message"]."</div>";
                unset ($_SESSION["message"]);
            }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="changepassword.php" method="post">
	<a>saisir votre nouveau mot de pass </a>
	<br>
	<input type="password" name="newPassword">
	<br>
	<a>saisir encore une fois pour le comfirmer</a>
	<br>
	<input type="password" name="passwordConfirm">
	<br>
	<input type="submit" value="Confirmer">
	</form>
</body>
</html>


