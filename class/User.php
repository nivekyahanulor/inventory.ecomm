<?php
require_once('../database/Database.php');
require_once('../interface/iUser.php');
session_start();
class User extends Database implements iUser {

	public function user_login($username, $password)
	{
		$sql = "SELECT *
				FROM user 
				WHERE user_account = ?
				AND user_pass = ?
		";
		return $this->getRow($sql, [$username, $password]);
	}//end login_user
	

}//en class User

$user = new User();


