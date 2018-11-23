<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['login']) && isset($_SESSION['mdp'])){
		if(isset($_POST['mdp1']) && isset($_POST['mdp2']))
		{
			//définit les mot de pass
			$mdp = htmlspecialchars($_SESSION['mdp']);
			$mdp1 = htmlspecialchars($_POST['mdp1']);
			$mdp2 = htmlspecialchars($_POST['mdp2']);
			$login = htmlspecialchars($_SESSION['login']);
			if($mdp1 != $mdp2){
				header('Location: formpassword.php');
				exit;
			}
			//import les fichiers locaux
			require('user.php');
			require_once 'bdd.php';
			//lianson entre le BDD
			$db = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
			$users = new User($login, $mdp);
			$users->set_db($db);
			$users->changePassword($mdp1);
			header('Location: welcome.php');
			exit;
		}
		else{
			header('Location: formpassword.php');
			exit;
		}
	}
	else{
		header('Location: formpassword.php');
		exit;
	}
?>