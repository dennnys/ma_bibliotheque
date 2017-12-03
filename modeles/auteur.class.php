<?php 
defined('BIBLIO') or die('Access interdi');

class Auteur {

	function getAuteurAll() {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			SELECT  id_auteur, nom_auteur 
			FROM auteur 
			ORDER BY nom_auteur");
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

	function souprimeAuteur($id) {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			DELETE FROM auteur 
			WHERE id_auteur = $id");
	}

	function getAuteur($id) {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			SELECT  id_auteur, nom_auteur 
			FROM auteur 
			WHERE id_auteur = '$id'");
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

	function modifieAuteur_BD($id, $nom) {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			UPDATE auteur SET nom_auteur = '$nom' 
			WHERE id_auteur = '$id'");
	}

	function creeAuteurBD($nom) {
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query("
			INSERT INTO auteur (nom_auteur) 
			VALUES ('$nom')");
	}





}