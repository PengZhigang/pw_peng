<?php
session_start();
include "users.php";
if($_SERVER['REQUEST_METHOD']!="POST")
{ 
	//or use: header("Location: localhost/www/tp2/signin.php");
	echo "REQUEST_METHOD MUST BE POST!!"; 
	exit;
}
if ( isset($_POST['login']) && isset($_POST['mdp']) )
{
    $login = htmlentities($_POST['login']);
    $mdp = htmlentities($_POST['mdp']);
}

if($login == "" || $mdp == "")  
{  
	echo "Please enter Login or mdp";  
	exit;
} 

if(!isset($users[$login])) 
{
	$_SESSION["message"]="Can not find account with this login " . $login;
	echo "Login or mdp incorrect!";  
	exit;
}
 
if($users[$login] != $mdp)
{ 
	$_SESSION["message"]="mdp wrong with this login " . $login;
	echo "'Login or mdp est incorrect!";  
	exit;
}  
$_SESSION[$login]=$login . "_authenticated";
//echo $_SESSION[$login];


header("Location: http://localhost/tp2/welcome.php?login=" . $login);

?>