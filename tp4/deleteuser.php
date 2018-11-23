<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['login']) && isset($_SESSION['mdp']))
	{
		$login = htmlspecialchars($_SESSION['login']);
		$mdp = htmlspecialchars($_SESSION['mdp']);
		require('user.php');
		require_once 'bdd.php';
		$db = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
		$users = new User($login, $mdp);

		$users->set_db($db);
		$users->delete();

		session_destroy();
		header('Location: signin.php');
		exit;
	}
	else
	{
		header('location: welcome.php');
		exit;
	}
?>