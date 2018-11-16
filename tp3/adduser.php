<?php
include "bdd.php";
try {
	$db= new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
	echo "connection with mysql.<br>";
} catch (Exception $e) {
	echo "ne peut pas connecter avec le base de donnees";
	exit;
}
error_reporting(0);
session_start();
if($_SERVER['REQUEST_METHOD']!="POST")
{ 
	$_SESSION["message"]="REQUEST_METHOD MUST BE POST!!";
	echo "<script>alert('REQUEST_METHOD MUST BE POST!!'); history.go(-1);</script>"; 
	exit;
}
if($_POST["signUpmdp"] == $_POST["confirmmdp"] && $_POST["signUpLogin"]!="" && $_POST["signUpmdp"]!="" && $_POST["confirmmdp"]!=""){
		$signUpmdp=password_hash($_POST["signUpmdp"],	PASSWORD_DEFAULT);
	 	//echo $signUpmdp;

		$sql="INSERT INTO users(login,password) VALUES ('{$_POST["signUpLogin"]}','{$signUpmdp}')";
		$result=$db->exec($sql);
		header("Location: http://localhost/tp3/signin.php");
  		}
 	
	 	//header("Location: http://localhost/tp3/signin.php");
	else{
	$_SESSION["message"]="sign up n'est pas correct";
	header("Location: http://localhost/tp3/signup.php");
	}
?>
