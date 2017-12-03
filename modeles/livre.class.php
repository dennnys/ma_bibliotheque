<?php
defined('BIBLIO') or die('Access interdi');

class Livre {

// return tout le livre trie filtre en ordre ASC or DESC
	 function getListe($filtre, $orde){
		$bdd = SingletonPDO::getInstance();
		$liste = $bdd->query('
			SELECT  id_livre, titre, annee, nom_auteur 
			FROM livre
			JOIN auteur ON auteur_livre = id_auteur
			ORDER BY '.$filtre.' '.$orde);
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

// return la liste des livres recherche par annee et titre
	function getRecherche($str) {
		$bdd = SingletonPDO::getInstance();
		$strSelect = "SELECT  id_livre, annee, titre, nom_auteur 
				FROM livre
				JOIN auteur ON auteur_livre = id_auteur
				WHERE titre LIKE '%$str%' 
					OR nom_auteur LIKE '%$str%' 
					OR annee LIKE '%$str%' 
				ORDER BY titre";
		$liste = $bdd->query($strSelect);
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

// return tout les comantaires
	function getCommantaires($idLivre){
		$bdd = SingletonPDO::getInstance();
		$commentaires = $bdd->query('select auteur, contenu from commentaires where livre_id = '.$idLivre.' ORDER BY datez DESC');
		return $commentaires->fetchAll(PDO::FETCH_ASSOC);
	} 
	
// enregistre le comantaire
	function commenterBD($id, $id_livre, $comm){
		$bdd = SingletonPDO::getInstance();
		$commentaire = $bdd->prepare('INSERT INTO commentaire (date_comm, text_comm, auteur_comm, livre_comm) VALUES (NOW(), :comm, :id, :id_livre)');
		$commentaire->bindParam(':comm', $comm);
		$commentaire->bindParam(':id', $id);
		$commentaire->bindParam(':id_livre', $id_livre);

		$commentaire->execute();
	} 

	function souprimeLivreBD($id) {
		$bdd = SingletonPDO::getInstance();
		$souprime = $bdd->prepare("
			DELETE FROM livre 
			WHERE id_livre = :id");
		$souprime->bindParam(':id', $id);
		$souprime->execute();
	}
	
	function getLivreID($id) {
		$bdd = SingletonPDO::getInstance();
		$livre = $bdd->prepare('
			SELECT id_livre, titre, annee, resume, auteur_livre, nom_auteur 
			FROM livre 
			JOIN auteur ON auteur_livre = id_auteur 
			WHERE id_livre = :id');
		$livre->bindParam(':id', $id);
		$livre->execute();
		return $livre->fetchAll(PDO::FETCH_ASSOC);
	}

	function modifieLivreBD($id, $annee, $titre, $auteur, $resume) {
		$bdd = SingletonPDO::getInstance();
		$livre = $bdd->prepare('UPDATE livre SET 
			titre = :titre,
			annee = :annee,
			resume = :resume,
			auteur_livre = :auteur 
			WHERE id_livre = :id');
		$livre->bindParam(':id', $id);
		$livre->bindParam(':annee', $annee);
		$livre->bindParam(':titre', $titre);
		$livre->bindParam(':auteur', $auteur);
		$livre->bindParam(':resume', $resume);
		$livre->execute();
		return $livre->fetchAll(PDO::FETCH_ASSOC);
	}

	function creeLivreBD($annee, $titre, $auteur, $resume) {
		$bdd = SingletonPDO::getInstance();
		$livre = $bdd->prepare('INSERT INTO livre ( titre, annee, resume, auteur_livre) VALUES (:titre, :annee, :resume, :auteur )');
		$livre->bindParam(':annee', $annee);
		$livre->bindParam(':titre', $titre);
		$livre->bindParam(':auteur', $auteur);
		$livre->bindParam(':resume', $resume);
		$livre->execute();
		return $livre->fetchAll(PDO::FETCH_ASSOC);
	}

	function getCommentairesLivreID($id) {
		$bdd = SingletonPDO::getInstance();
		$comm = $bdd->prepare('
			SELECT id_comm, date_comm, text_comm,auteur_comm, nom_user 
			FROM commentaire 
			JOIN user ON auteur_comm = id_user 
			WHERE livre_comm = :id 
			ORDER BY date_comm DESC');
		$comm->bindParam(':id', $id);
		$comm->execute();
		return $comm->fetchAll(PDO::FETCH_ASSOC);
	}

	function commenterSouprime($id) {
		$bdd = SingletonPDO::getInstance();
		$comm = $bdd->prepare('
			DELETE FROM commentaire 
			WHERE id_comm = :id');
		$comm->bindParam(':id', $id);
		$comm->execute();
		return $comm->fetchAll(PDO::FETCH_ASSOC);
	}

}