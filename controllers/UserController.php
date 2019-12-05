<?php

class UserController
{
	public function actionRegister()
	{
		$name = '';
		$email = '';
		$password = '';
		$result = false;

		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
		}

		$errors = false;

		if(!User::checkName($name)){
		
			$errors[] = 'Имя не должно быть короче 2х символов';
		}

		if(!User::checkPassword($password)){
		
			$errors[] = 'Пароль не должен быть короче 6 символов';
		}

		if(User::checkEmailExists($email)){
		
			$errors[] = 'Пользователь с этим email уже зарегестрирован.';
		}



		if($errors == false){
			$result = User::register($name,$password,$email);
		}
		require_once (ROOT. '/views/user/register.php');
		return true; 
	}
}