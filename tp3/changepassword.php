<?php
	session_start();
	include "bdd.php";
	if($_SERVER['REQUEST_METHOD'] != "POST") {
		header("Location: http://localhost/tp3/formpassword.php");
		exit;
	}
	if(!isset($_POST["newPassword"]) || !isset($_POST["passwordConfirm"])) {
		$_SESSION["message"]="POST probleme";
		header("Location: http://localhost/tp3/formpassword.php");
		exit;
	}
	if($_POST["newPassword"] =="" || $_POST["passwordConfirm"] =="") {
		$_SESSION["message"]="mot de passe ne peut pas etre vide";
		header("Location: http://localhost/tp3/formpassword.php");
		exit;
	}
	if($_POST["newPassword"] != $_POST["passwordConfirm"]) {
		$_SESSION["message"]="les mots de passe sont different ";
		header("Location: http://localhost/tp3/formpassword.php");
		exit;
	}
	if(preg_match("/ /",$_POST["newPassword"])){
		$_SESSION["message"]="ne peux pas saisir espace dans le mot de pass";
		header("Location: http://localhost/tp3/formpassword.php");
		exit;
	}
	//if everything is correct, now we connect with database and change PWD
	try {
		$db= new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
	echo "connection avec mysql.<br>";
	} catch (Exception $e) {
		echo "ne peux pas connetcter avec base de donnees";
		exit;
	}
	$newPassword=password_hash($_POST["newPassword"],PASSWORD_DEFAULT);
	echo $_POST["newPassword"]."<br>";
	echo $newPassword."<br>";
	if($res = $db->query("UPDATE users SET password='{$newPassword}' WHERE login='{$_SESSION['user']}'")){
		echo "mot de pass est change";
		header("Location: http://localhost/tp3/welcome.php");
	}else{
		header("Location: http://localhost/tp3/formpassword.php");
	}

?>