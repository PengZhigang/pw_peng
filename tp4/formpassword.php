<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['login']))
	{
		?>
		<form action="changepassword.php" method="post">
			<p><input type="password" name="mdp1" placeholder="mot de passe"></p>
			<p><input type="password" name="mdp2" placeholder="mot de passe"></p>
			<p><input type="submit" name="Envoie" value="Changer de mot de passe"></p>
		</form>
		<a href="welcome.php">Bienvenu</a>
		<?php
	}
	else
	{
		header('Location: signin.php');
		exit;
	}

?>