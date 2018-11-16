<?php
session_start();
if($_SERVER['REQUEST_METHOD']!="GET") echo "GET!"; 
if(isset($_SESSION["message"])) {
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
			<a>Password:</a>
			<input type="password" name="password">
			<br>
			<input type="submit" value="se connecter">
			<br>
		</form>
		<a href="http://localhost/tp3/signup.php"><input type="button" value='Sign Up'></a>
	</body>
</html>
