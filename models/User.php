<?php

class User
{
	public static function register($name, $password, $email){
		$db = Db::getConnection();

		$sql = 'INSERT INTO user (name, password, email) VALUES (:name, :password, :email)';

		$result = $db -> prepare($sql);
		$result -> bindParam(':name', $name, PDO::PARAM_STR);
		$result -> bindParam(':password', $password, PDO::PARAM_STR);
		$result -> bindParam(':email', $email, PDO::PARAM_STR);

		return $result -> execute();
	}



	public static function checkName($name){
		if(strlen($name)>=2){
			return true;
		}
		return false;
	}

	public static function checkPassword($password){
		if(strlen($password)>=6){
			return true;
		}
		return false;
	}

	public static function checkEmailExists($email){
		
		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

		$result = $db -> prepare($sql);
		$result -> bindParam(':email', $email, PDO::PARAM_STR);
		$result -> execute();

		if($result -> fetchColumn())
			return true;
		return false;
		
	}
}