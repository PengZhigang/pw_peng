<?php
	session_start();
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
<form action="adduser.php" method="post">
	<a>Creer votre nouveau login</a>
	<br>
	<input type="text" name="signUpLogin">
	<br>
	<a>saisir le mot de passe</a>
	<br>
	<input type="password" name="signUpPassword">
	<br>
	<a>saisir encore une fois pour le comfirmer</a>
	<br>
	<input type="password" name="confirmPassword">
	<br>
	<input type="submit" value="Confirm">
	</form>
</body>
</html>


