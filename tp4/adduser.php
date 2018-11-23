<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['mdp2'])){
			$login = htmlspecialchars($_POST['login']);
			$mdp1 = htmlspecialchars($_POST['mdp']);
			$mdp2 = htmlspecialchars($_POST['mdp2']);
		if($mdp1 != $mdp2){
			header('Location: signup.php');
			exit;
		}
		require('user.php');
		require_once 'bdd.php';
		$db = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
		$users = new User($login, $mdp1);
		$users->set_db($db);
		$users->create();
		header('Location: signin.php');
		exit;
		}
		else
		header('Location: signup.php');
		exit;
	}
	else
		header('Location: signup.php');
	exit;
?>