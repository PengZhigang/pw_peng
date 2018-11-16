<?php
session_start();
include "bdd.php";
try {
	$db= new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
	//echo "connection with mysql.<br>";
} catch (Exception $e) {
	echo "ne peut pas connecter avec le base de donnees";
	exit;
}
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
	echo "<script>alert('Saisir le mot de passe SVP！'); history.go(-1);</script>";  
	exit;
} 

function getLoginByUsers($l) {
 	global $db;
 	 $statement = $db->prepare('SELECT * FROM users WHERE login = :l');
	 $statement->bindValue(':l', $l, PDO::PARAM_STR);
	 $statement->execute();
	 return $statement->fetchAll();
}

if(!getLoginByUsers($_POST["login"])) 
{
	$_SESSION["message"]="ne peux pas connecter avec ce login " . $login;
	echo "<script>alert('Login ou mot de passe incorrect！');history.go(-1);</script>";  
	exit;
}


function verifymdp($lg,$pwd,$db){
$res = $db->query("SELECT password FROM users WHERE login='" . $lg . "'");
while($data = $res->fetch(PDO::FETCH_ASSOC)) {
 foreach($data as $key) {
		if(mdp_verify($pwd,$key))
 			return true;
 		else
 			return false;
		}
	}
}
if(!verifymdp($login,$mdp,$db))
{ 
	$_SESSION["message"]="mot de pass incorrect " . $login;
	echo "<script>alert('Login ou mot de pass incorrect！');history.go(-1);</script>";  
	exit;
}  
$_SESSION['user']=$login;
echo $_SESSION['user'];
header("Location: http://localhost/tp3/welcome.php");
?>