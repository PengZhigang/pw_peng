<?php
	session_start();
	if(isset($_SESSION["login"])){
		?>
		<!DOCTYPE html>
		<html>
		<head>
		<title>Bienvenu</title>
		</head>
		<body>
			<p> <?php echo 'Bienvenue ' . $_SESSION['login']; ?> 
				<a href="signout.php">Déconnexion</a>
				<a href="formpassword.php">Changer de mot de passe !</a>
				<a href="deleteuser.php">Supprimer votre compte !</a>
			</p>
		</body>
		</html>
		<?php
	}
	else{
		header('Location:singin.php');
		exit();
	}
?>
