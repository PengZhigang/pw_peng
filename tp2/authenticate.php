<?php
session_start();
include "users.php";
if($_SERVER['REQUEST_METHOD']!="POST")
{ 
	//or use: header("Location: localhost/tp2/signin.php");
	echo "<script>alert('REQUEST_METHOD MUST BE POST!!'); history.go(-1);</script>"; 
	exit;
}
if ( isset($_POST['login']) && isset($_POST['mdp']) )
{
    $login = htmlentities($_POST['login']);
    $mdp = htmlentities($_POST['mdp']);
}

if($login == "" || $mdp == "")  
{  
	echo "<script>alert('Please enter Login or mdp！'); history.go(-1);</script>";  
	exit;
} 

if(!isset($users[$login])) 
{
	$_SESSION["message"]="Can not find account with this login " . $login;
	echo "<script>alert('Login or mdp incorrect！');history.go(-1);</script>";  
	exit;
}
 
if($users[$login] != $mdp)
{ 
	$_SESSION["message"]="mdp wrong with this login " . $login;
	echo "<script>alert('Login or mdp est incorrect！');history.go(-1);</script>";  
	exit;
}  
$_SESSION[$login]=$login . "_authenticated";
//echo $_SESSION[$login];


header("Location: http://localhost/tp2/welcome.php?login=" . $login);

?>