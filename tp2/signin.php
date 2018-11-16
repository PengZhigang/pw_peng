<?php
session_start();
if($_SERVER['REQUEST_METHOD']!="GET") echo "GET!!!!!!!!!!!!!!!!!!!!!!!!!!"; 
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
		<title>Signin</title>
	</head>
	<body>
		<h1>Signin</h1>
		<form action="authenticate.php" method="post">
			<a>Login:</a>
			<input type="text" name="login">
			<a>mdp:</a>
			<input type="password" name="mdp">
			<br>
			<input type="submit" value="se connecter">
		</form>
	</body>
</html>
