<?php
	session_start();
	include "bdd.php";
	if($_SERVER['REQUEST_METHOD'] != "GET") {
		header("Location: http://localhost/tp3/welcome.php");
		exit;
	}
	try {
		$db= new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
	echo "connection avec mysql.<br>";
	} catch (Exception $e) {
		echo "failed connection with database";
		exit;
	}
	if($res = $db->query("DELETE FROM users WHERE login='{$_SESSION['user']}'")){
		header("Location: http://localhost/tp3/signin.php");
		exit;
	}else{
		$_SESSION["message"]="Can not delete this account";
		header("Location: http://localhost/tp3/welcome.php");
	}
?>