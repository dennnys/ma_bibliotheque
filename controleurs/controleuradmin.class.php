<?php 
defined('BIBLIO') or die('Access interdi');

class ControleurAdmin {

	function adminListe() {
		$oListe = new Users();
		$liste = $oListe->getUserAll();

		$vueAdmin = new Vue('ListeUserAll');
		$vueAdmin->generer(array('liste'=>$liste));
	}

	function adminSouprime($id) {
		$oListe = new Users();
		$liste = $oListe->sourpimeUserId($id);
	}

	function userAjout() {
		$oListe = new Users();
		$liste = $oListe->getStatutAll();

		$vueAdmin = new Vue('AjouteUser');
		$vueAdmin->generer(array('liste'=>$liste));
	}

	function existeUser($login) {
		$oListe = new Users();
		$user = $oListe->getUserLogin($login);
		if (empty($user)) { return false; }
			else { return true; }
	}

	function creeUser($nom, $login, $statut){
		$oListe = new Users();
		$oListe->creeUserBD($nom, $login, $statut);
	}

	function modifieUser($nom, $login, $pass=''){
		$oListe = new Users();
		$oListe->modifieUserBD($nom, $login, $pass);
		$_SESSION['user_biblio']['nom_user'] = $nom;
		$_SESSION['user_biblio']['login'] = $login;
	}

	function userProfil() {
		$oListe = new Users();
		$liste = $oListe->pass123();
		if (!empty($liste)) { $liste=false; }
			else { $liste=true; }; 
		$vueAdmin = new Vue('ModifieUser');
		$vueAdmin->generer(array('liste'=>$liste));
	}

}
