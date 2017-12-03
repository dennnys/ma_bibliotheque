<?php 
defined('BIBLIO') or die('Access interdi');

class Autentification {

	static function login($login, $pass) {
		$userClass = new Users; 
		$user = $userClass->getUser($login, $pass);
		if (!empty($user)) {
			$_SESSION["user_biblio"] = $user[0];
		} else {
			$_SESSION["log_error"] = 'Votre login ou mot de passe est incorrect. Veuillez réessayer.';
		}
	}

	static function isAuthen(){
		if(Utils::getSession('user_biblio')){
			return true;
		} else {
				return false;
			}
	}






}
