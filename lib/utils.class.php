<?php 
defined('BIBLIO') or die('Access interdi');

class Utils {

	static function getPost($value) {
		if (isset($_POST[$value])) {
			return $_POST[$value];
		} else { return false; }
	}

	static function getGet($value) {
		if (isset($_GET[$value])) {
			return $_GET[$value];
		} else { return false; }
	}

	static function getSession($value) {
		if (isset($_SESSION[$value])) {
			return $_SESSION[$value];
		} else { return false; }
	}

// vérifier qui est sélectionné dans la <select> pour enregistre selected
	static function ifSelected($value1, $value2) {
		$selected = '';
		if (isset($_POST[$value1]) && ($_POST[$value1] === $value2)) $selected = 'selected';
			return $selected;

	}

// function pour affiche le Vue Erreur
	static function erreur($erreur){
				$vueAccueil = new Vue('Erreur');
				$vueAccueil->generer(array('erreur' => $erreur));
		}

	// filtre forte pour haker
	static function filtreForte($str) {
		$str = trim($str);
		$str = strip_tags($str);
		//$str = mysqli_real_escape_string(SingletonPDO::getInstance(), $str);
		return $str;
	}


}