<?php
session_start();
?>
<br>
<form action="resetCompteur.php" method="post">
	<input type="submit" name="des" value="recommencer de compter">
</form>
<?php
	if(isset($_POST["des"])) {
	unset($_SESSION['vu']);
	header("Location: http://localhost/tp1/exo3/compteur.php");
	}
?>