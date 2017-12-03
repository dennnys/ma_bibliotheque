<?php 
defined('BIBLIO') or die('Access interdi');

class Users {

	function getUser($login, $pass) {
		$pass = md5($pass. SEL);
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			SELECT  id_user, login, nom_user, statut_user, nom_statut 
			FROM user 
			JOIN statut ON statut_user = id_statut 
			WHERE pass = '$pass' AND login = '$login'");
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

	function getUserAll() {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			SELECT  id_user, login, nom_user, statut_user, nom_statut 
			FROM user 
			JOIN statut ON statut_user = id_statut 
			ORDER BY nom_user");
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

	function sourpimeUserId($id) {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			DELETE FROM user 
			WHERE id_user = $id");
	}

	function creeUserBD($nom, $login, $statut) {
		$pass = md5('123'. SEL);
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			INSERT INTO user (login, pass, nom_user, statut_user) 
			VALUES ('$login', '$pass', '$nom', $statut)");
	}

	function modifieUserBD($nom, $login, $pass) {
		$bdd = SingletonPDO::getInstance();
		if ($pass != '') {
			$pass = md5($pass. SEL);
			$str_query = "
				UPDATE user SET nom_user = '$nom', login = '$login', pass = '$pass' 
				WHERE id_user =".$_SESSION['user_biblio']['id_user'];
		} else {
			$str_query = "
				UPDATE user SET nom_user = '$nom', login = '$login' 
				WHERE id_user =".$_SESSION['user_biblio']['id_user'];
		}
		$bdd->query($str_query);
	}

	function getStatutAll() {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			SELECT  id_statut, nom_statut 
			FROM statut");
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

	function getUserLogin($login) {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			SELECT  id_user 
			FROM user 
			WHERE login = '$login'");
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

	function pass123() {
		$pass = md5('123'. SEL);
		$id = $_SESSION['user_biblio']['id_user'];
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			SELECT  nom_user 
			FROM user 
			WHERE pass = '$pass' AND id_user = $id");
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}



}