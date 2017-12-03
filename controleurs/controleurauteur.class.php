<?php 
defined('BIBLIO') or die('Access interdi');

class ControleurAuteur {

	function auteurListe() {
		$oListe = new Auteur();
		$liste = $oListe->getAuteurAll();

		$vueAuteur = new Vue('ListeAuteurAll');
		$vueAuteur->generer(array('liste'=>$liste));
	}

	function auteurSouprime($id) {
		$oListe = new Auteur();
		$liste = $oListe->souprimeAuteur($id);
	}

	function auteurModifie($id) {
		$oListe = new Auteur();
		$liste = $oListe->getAuteur($id);
		$vueAuteur = new Vue('ModifieAuteur');
		$liste = $liste[0];
		$vueAuteur->generer(array('liste'=>$liste));
	}

	function auteurModifieBD($id, $nom) {
		$oListe = new Auteur();
		$liste = $oListe->modifieAuteur_BD($id, $nom);
	}

	function auteurAjoute() {
		$vueAuteur = new Vue('AjouteAuteur');
		$vueAuteur->generer(array('liste'=>''));
	}

	function creeAuteur($nom) {
		$oListe = new Auteur();
		$liste = $oListe->creeAuteurBD($nom);
	}



}