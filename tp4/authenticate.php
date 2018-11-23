<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['login']) && isset($_POST['mdp'])){
			require('user.php');
			require_once 'bdd.php';
			$login = htmlspecialchars($_POST['login']);
			$mdp = htmlspecialchars($_POST['mdp']);
			$db = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
			$users = new User($login, $mdp);
			$users->set_db($db);
			$correct = $u->exists();
			if($correct){
				session_start();
				$_SESSION['login'] = $login;
				$_SESSION['mdp'] = $mdp;
				header('Location: welcome.php');
				exit;
			}
			else{
				header('Location: signin.php');
				exit;
			}
		}
		else{
			header('Location: signin.php');
			exit;
		}
	}
	else
	{
		echo 'Le serveur utilise la methode GET';
	}
?>