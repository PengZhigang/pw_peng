
<!DOCTYPE html>
<html lang="fr">
<head>
 <meta charset="UTF-8">
 <title> PHP </title>
</head>
<body>
 <form method="post" action="heure.php">
 <input type="text" name="login" >
 <input type="submit" value="requet">
  <?php 
 if(isset($_POST["login"])) {
 	echo "<br>".$_POST["login"]." bienvenu";
 	}
 else{
 	echo" <br>bienvenu";
 }
 ?>
 </form>
</body>
</html>