<!DOCTYPE html>
<html lang="fr">
	<head>
		 <meta charset="UTF-8">
 			<title> PHP </title>
	</head>
	<body>
		 <form method="post" action="formulaireBonjour.php">
 			<a>name</a><br>
 			<input type="text" name="login"><br>
 			<a>text</a><br>
 			<input type="text" name="mdp"><br>
 			<input type="submit" value="submit">
 		</form>
 <?php 
 if(!isset($_POST["login"])){
 	echo"pas de nom";
 }
 if(!isset($_POST["mdp"])){
 	echo "<br>";
 	echo"erreur: mdp";
 }
else{
 		echo "<br>".$_POST["login"]." bienvenue<br>";
 		echo "votre mdp est:  ".$_POST["mdp"];
 	}
 ?>
</body>
</html>