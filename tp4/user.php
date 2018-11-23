<?php
require('model_base.php');
class User extends Model_Base{
	private $login;
	private $password;
	const USER_TABLE = 'User';
	public function __construct($login, $password){
		$this->login= $login;
		$this->password = $password;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getPassword(){
		return $this->password;
	}
	public function setLogin($login){
		$this->login = $login;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function exists()
	{
		$q = self::$_db->prepare("SELECT password FROM " .self::USER_TABLE. " WHERE login = :login");
		$q->execute(array(
			'login' => $this->login
		));

		$resultat = $q->fetch();

		$isPasswordCorrect = password_verify($this->password, $resultat['password']);

		return $isPasswordCorrect;
	}

	public function create()
	{
		$q = self::$_db->prepare('INSERT INTO ' .self::USER_TABLE. '(login, password) VALUES(:login, :password)');
		$q->execute(array(
			'login' => $this->login,
			'password' => password_hash($this->password, PASSWORD_DEFAULT)
		));
	}

	public function changePassword($password)
	{
		$q = self::$_db->prepare('UPDATE ' .self::USER_TABLE. ' SET password = :password WHERE login = :login');
		$q->execute(array(
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'login' => $this->login
		));
		User::setPassword($password);
	}

	public function delete()
	{
		$q = self::$_db->prepare('DELETE FROM '.self::USER_TABLE. ' WHERE login = :login');
		$q->execute(array(
			'login' => $this->login
		));
	}
}
?>