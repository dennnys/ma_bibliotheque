<?php 
defined('BIBLIO') or die('Access interdi');

class ControleurLivre{ 

// affiche le liste des livres
	function livreListe($filtre='titre',$orde='ASC'){
		$oListe = new Livre();
		$liste = $oListe->getListe($filtre, $orde);

		$vueLivre = new Vue('Liste');
		$vueLivre->generer(array('liste'=>$liste));
	}

	// recherche des livres
	function listeRecherche($annee='', $titre='') {
		$oListe = new Livre();
		$liste = $oListe->getRecherche($annee, $titre);

		$vueLivre = new Vue('Recherche');
		$vueLivre->generer(array('liste'=>$liste));
	}

	function livreSouprime($id) {
		$oListe = new Livre();
		$liste = $oListe->souprimeLivreBD($id);
	}

	function livreModifie($id) {
		$oListe = new Livre();
		$liste = $oListe->getLivreID($id);

		$aListe = new Auteur();
		$listAuteur = $aListe->getAuteurAll();

		$vueLivre = new Vue('ModifieLivre');
		$vueLivre->generer(array('liste'=>$liste[0], 'auteurList'=>$listAuteur));
	}

	function modifieLivre($id, $annee, $titre, $auteur, $resume) {
		$oListe = new Livre();
		$liste = $oListe->modifieLivreBD($id, $annee, $titre, $auteur, $resume);
	}

	function livreCree() {
		$aListe = new Auteur();
		$listAuteur = $aListe->getAuteurAll();
		$vueLivre = new Vue('CreeLivre');
		$vueLivre->generer(array('liste'=>$listAuteur));
	}

	function creeLivre($annee, $titre, $auteur, $resume) {
		$oListe = new Livre();
		$liste = $oListe->creeLivreBD($annee, $titre, $auteur, $resume);
	}

	function livreAffiche($id) {
		$oListe = new Livre();
		$liste = $oListe->getLivreID($id);

		$comms = $oListe->getCommentairesLivreID($id);

		$vueLivre = new Vue('Livre');
		$vueLivre->generer(array('livre'=>$liste[0], 'comms'=>$comms));
	}

	function creeComm($id, $id_livre, $comm) {
		$oListe = new Livre();
		$liste = $oListe->commenterBD($id, $id_livre, $comm);
	}

	function souprimeComm($id) {
		$oListe = new Livre();
		$liste = $oListe->commenterSouprime($id);
	}

}
