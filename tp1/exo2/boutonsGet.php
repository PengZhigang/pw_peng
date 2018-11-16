<!DOCTYPE html>
<html lang="fr">
	head>
		 <meta charset="UTF-8">
 		<title> PHP </title>
	</head>
	<body>
		 <form action="boutonsGet.php" method="get">
			 <input type="submit" name="b1" value="bouton1">
			 <input type="submit" name="b1" value="bouton2">
			 <input type="submit" name="b1" value="bouton3">
			 <input type="submit" name="b1" value="bouton4">
			 <input type="submit" name="b1" value="bouton5">
			 <input type="submit" name="b1" value="bouton6">
			 <input type="submit" name="b1" value="bouton7">
			 <input type="submit" name="b1" value="bouton8">
			 <input type="submit" name="b1" value="bouton9">
			 <input type="submit" name="b1" value="bouton10">
		 </form>
		 <?php 
		 	if(isset($_GET["b1"])) echo $_GET["b1"];
		 ?>
	</body>
</html>