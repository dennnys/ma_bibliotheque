<?php
defined('BIBLIO') or die('Access interdi');
 // class controleur principale

if (!Utils::getGet('controler')) $_GET['controler'] = 'accueil';

class Controleur {
	
	private $_ctrlAccueil;
	private $_ctrlLivre;
	private $_ctrlAdmin;
	private $_ctrlAuteur;

// vérifié que controleur est sélectionné
	function routerRequete(){
		try{
			// connexion
			if(isset($_POST['connexion'])){
				$login = Utils::getPost('login');
				$pass = Utils::getPost('pass');
				if ($login && $pass) {
					$login = Utils::filtreForte($login);
					$pass = Utils::filtreForte($pass);
					Autentification::login($login, $pass);
				}
			}

			if(Utils::getGet('controler')){
				switch ($_GET['controler']) {

					case 'liste': // liste les livres
						$this->liste();
						break;

					case 'slivre': // souprime le livres
						$this->droi(2);
						$this->slivre();
						break;

					case 'mlivre': // modifie le livre
						$this->droi(2);
						$this->mlivre();
						break;

					case 'livre': // liste de livre
						$this->livre();
						break;

					case 'ajoutlivre': // cree en livre
						$this->droi(2);
						$this->ajoutlivre();
						break;

					case 'recherche': // recherche
						$this->recherche();
						break;

					case 'accueil': // accueil de site
						$this->accueil();
						break;

					case 'deloge': // deloge
						$this->deloge();
						break;

					case 'mprofil': // modifie le profile de user
						$this->droi(3);
						$this->mprofil();
						break;

					case 'listeuser': // liste les users
						$this->droi(1);
						$this->listeuser();
						break;

					case 'listauteur': // liste des autheurs
						$this->droi(2);
						$this->listauteur();
						break;

					case 'mauteur': // modifie le auteur
						$this->droi(2);
						$this->mauteur();
						break;

					case 'ajoutuser': // cree user
						$this->droi(1);
						$this->ajoutuser();
						break;

					case 'sadmin': // souprime un user
						$this->droi(1);
						$this->sadmin();
						break;

					case 'sauteur': // souprime un auteur
						$this->droi(2);
						$this->sauteur();
						break;

					case 'ajoutauteur': // cree un auteur
						$this->droi(2);
						$this->ajoutauteur();
						break;

					default:
						//$this->accueil(); // ou
						throw new Exception('Controleur incorrect !!!');
						break;
				}
			}	else {	$this->liste();	}
		}	catch(Exception $e) { 
				// include('vues/vErreur.php'); 
			Utils::erreur($e->getMessage());
			}
	}
// info une livre
	private function livre() {
		$this->_ctrlLivre = new ControleurLivre();
		// souprime une commentaire
		if(isset($_POST['souprime_comm'])) {
			$s_comm_id = Utils::getPost('s_comm_id');
			if ($s_comm_id) {
				$s_comm_id = Utils::filtreForte($s_comm_id);
				if (strlen($s_comm_id) > 0 ) { 
					$this->_ctrlLivre->souprimeComm($s_comm_id);
				} else {
						throw new Exception('Id incorrect !!!');
					}
			} else {
					throw new Exception('Valeur introdui incorect !!!'); 
				}
		}


// cree commentaire
		if (isset($_SESSION['error_comm']))
			unset($_SESSION['error_comm']);
		if(isset($_POST['cree_comm'])){
				$comm = Utils::getPost('comm_livre');
				$id_livre = Utils::getPost('comm_livre_id');
				$id = $_SESSION['user_biblio']['id_user'];
				if ($comm && $id_livre) {
					$comm = Utils::filtreForte($comm);
					$id_livre = Utils::filtreForte($id_livre);
						if (strlen($comm) > 5 ) {
							$this->_ctrlLivre->creeComm($id, $id_livre, $comm);
						} else {
							$_SESSION['error_comm'] = 'Minimum six caractères !!!';
						}
				} else {
					throw new Exception('Valeur introdui incorect !!!');
				}
			}

		$id = intval(Utils::getGet('id'));
		if($id > 0) {

			$this->_ctrlLivre->livreAffiche($id);
		} else {
			throw new Exception('Id incorrect !!!');
		}
	}
// modefi le profile de utilisateur
	private function mprofil() {
			$this->_ctrlAdmin = new ControleurAdmin();
			$this->_ctrlAdmin->userProfil();
	}
// liste toutes les livres
	private function liste() {
		$this->_ctrlLivre = new ControleurLivre();

		// modifie livre
		if(isset($_SESSION['error_livre_modifie'])) unset($_SESSION['error_livre_modifie']);
		if(isset($_POST['modifie_livre'])){
				$id = Utils::getPost('id_livre_m');
				$titre = Utils::getPost('nom_livre_m');
				$annee = Utils::getPost('annee_livre_m');
				$auteur = Utils::getPost('auteur_livre_m');
				$resume = Utils::getPost('resume_livre_m');
				if ($id && $titre && $annee && $auteur && $resume) {
					$id = Utils::filtreForte($id);
					$annee = Utils::filtreForte($annee);
					$annee = intval($annee);
					$titre = Utils::filtreForte($titre);
					$auteur = Utils::filtreForte($auteur);
					$resume = Utils::filtreForte($resume);
						if (strlen($annee) > 2 && strlen($titre) > 2 && strlen($resume) > 2) {
							$this->_ctrlLivre->modifieLivre($id, $annee, $titre, $auteur, $resume);
						} else {
							$_SESSION['error_livre_modifie'] = 'Minimum trois caractères !!!';
							header("Location: index.php?controler=mlivre&id=".$id);
						}
				} else {
					throw new Exception('Valeur introdui incorect !!!');
				}
			}

		// cree livre
		if(isset($_SESSION['error_livre_cree'])) unset($_SESSION['error_livre_cree']);
		if(isset($_POST['cree_livre'])){
				$titre = Utils::getPost('nom_livre');
				$annee = Utils::getPost('annee_livre');
				$auteur = Utils::getPost('auteur_livre');
				$resume = Utils::getPost('resume_livre');
				if ($titre && $annee && $auteur && $resume) {
					$annee = Utils::filtreForte($annee);
					$annee = intval($annee);
					$titre = Utils::filtreForte($titre);
					$auteur = Utils::filtreForte($auteur);
					$resume = Utils::filtreForte($resume);
						if (strlen($annee) > 2 && strlen($titre) > 2 && strlen($resume) > 2) {
							$this->_ctrlLivre->creeLivre($annee, $titre, $auteur, $resume);
						} else {
							$_SESSION['error_livre_cree'] = 'Minimum trois caractères !!!';
							header("Location: index.php?controler=ajoutuser");
						}
				} else {
					throw new Exception('Valeur introdui incorect !!!');
				}
			}


		$filtreArray = ['titre', 'annee', 'nom_auteur'];
		$ordreArray = ['ASC', 'DESC'];
			if(Utils::getGet('filtre')&& Utils::getGet('ordre')) {
							$filtre = Utils::getGet('filtre');
							$ordre = Utils::getGet('ordre');
							if (!$filtre || !in_array($filtre, $filtreArray)) { 
								throw new Exception('Tri invalide !!!'); }
								elseif (!$ordre || !in_array($ordre, $ordreArray)) { 
									throw new Exception('Ordre invalide !!!'); } 
									else {
										$this->_ctrlLivre->livreListe($filtre,$ordre); 
									}
							} else { $this->_ctrlLivre->livreListe(); }
	}
// souprime une livre
	private function slivre() {
		$id = intval(Utils::getGet('id'));
		if($id > 0) {
			$this->_ctrlLivre = new ControleurLivre();
			$this->_ctrlLivre->livreSouprime($id);
			header("Location: index.php?controler=liste");
		} else {
			throw new Exception('Id incorrect !!!');
		}
	}
// modifie une livre
	private function mlivre() {
		$id = intval(Utils::getGet('id'));
		if($id > 0) {
			$this->_ctrlLivre = new ControleurLivre();
			$this->_ctrlLivre->livreModifie($id);
		} else {
			throw new Exception('Id incorrect !!!');
		}
	}
// cree une livre
	private function ajoutlivre() {
		$this->_ctrlLivre = new ControleurLivre();
		$this->_ctrlLivre->livreCree();
	}
// affiche toutes les utilisateurs enregistre
	private function listeuser() {

		// si tu est pas un user -> redirect
		if ($_SESSION['user_biblio']['statut_user'] != 1)
			header("Location: index.php?controler=accueil");

		$this->_ctrlAdmin = new ControleurAdmin();
		
		// cree le utilisateur
		if(isset($_SESSION['error_user_cree'])) unset($_SESSION['error_user_cree']);
		if(isset($_POST['cree_user'])){
				$nom = Utils::getPost('nom_user');
				$login = Utils::getPost('login_user');
				$statut = Utils::getPost('statut_user');
				if ($nom && $login && $statut) {
					$login = Utils::filtreForte($login);
					$nom = Utils::filtreForte($nom);
					$statut = Utils::filtreForte($statut);
						if (strlen($login) > 2 && strlen($nom) > 2) {
							if (!$this->_ctrlAdmin->existeUser($login)) {
								$this->_ctrlAdmin->creeUser($nom, $login, $statut);
							} else {
								$_SESSION['error_user_cree'] = 'Set login deja existe';
								header("Location: index.php?controler=ajoutuser");
							}
						} else {
							$_SESSION['error_user_cree'] = 'Minimum trois caractères !!!';
							header("Location: index.php?controler=ajoutuser");
						}
				} else {
					throw new Exception('Valeur introdui incorect !!!'.$nom);
				}
			}

		// modifie le utilisateur
		if(isset($_SESSION['error_user_modifie'])) unset($_SESSION['error_user_modifie']);
		if(isset($_POST['modifie_user'])){
				$nom = Utils::getPost('nom_user_m');
				$login = Utils::getPost('login_user_m');
				$pass = Utils::getPost('pass_user_m');
				if ($nom && $login) {
					$login = Utils::filtreForte($login);
					$nom = Utils::filtreForte($nom);
						if (strlen($login) > 2 && strlen($nom) > 2) {
							if ($pass) {
								$pass = Utils::filtreForte($pass);
								if (strlen($pass) > 2) {
									$this->_ctrlAdmin->modifieUser($nom, $login, $pass);
								} else {
									$_SESSION['error_user_modifie'] = 'Minimum trois caractères !!!';
									header("Location: index.php?controler=ajoutuser");
								}
							} else {
								$this->_ctrlAdmin->modifieUser($nom, $login);
							}
						} else {
							$_SESSION['error_user_cree'] = 'Minimum trois caractères !!!';
							header("Location: index.php?controler=ajoutuser");
						}
				} else {
					throw new Exception('Valeur introdui incorect !!!');
				}
			}


		$this->_ctrlAdmin->adminListe();
	}
// affiche toute les auteurs
	private function listauteur() {
		$this->_ctrlAuteur = new ControleurAuteur();
		// cree un auteur
		if(isset($_SESSION['error_auteur_cree'])) {unset($_SESSION['error_auteur_cree']); }
		if(isset($_POST['cree_auteur'])) {
			$nom = Utils::getPost('nom_auteur');
			if ($nom ) {
				$nom = Utils::filtreForte($nom);
				if (strlen($nom) > 2) { 
					$this->_ctrlAuteur->creeAuteur($nom);
				} else {
							$_SESSION['error_auteur_cree'] = 'Minimum trois caractères !!!';
							header("Location: index.php?controler=ajoutauteur");
						}
			} else {
				throw new Exception('Valeur introdui incorect !!!');
			}
		} 

		// modifie un auteur
		if(isset($_SESSION['error_auteur_modifie'])) unset($_SESSION['error_auteur_modifie']);
		if(isset($_POST['modifie_auteur'])){
			$nom = Utils::getPost('nom_auteur_m');
			$id = Utils::getPost('id_auteur_m');
			if ($nom && $id) {
					$id = Utils::filtreForte($id);
					$nom = Utils::filtreForte($nom);
						if (strlen($nom) > 2) {
							$this->_ctrlAuteur->auteurModifieBD($id, $nom);
						} else {
							$_SESSION['error_auteur_modifie'] = 'Minimum trois caractères !!!';
							header("Location: index.php?controler=mauteur&id=".$id);
						}
				} else {
					throw new Exception('Valeur introdui incorect !!!');
				}

		}

		$this->_ctrlAuteur->auteurListe();
	}
// affiche le vue pour modifie un auteur
	private function mauteur() {
		$id = intval(Utils::getGet('id'));
		if($id > 0) {
			$this->_ctrlAuteur = new ControleurAuteur();
			$this->_ctrlAuteur->auteurModifie($id);
		} else {
			throw new Exception('Id incorrect !!!');
			}
	}
// affiche le vue pour cree un auteur
	private function ajoutauteur() {
		$this->_ctrlAuteur = new ControleurAuteur();
		$this->_ctrlAuteur->auteurAjoute();
	}
// affiche le vue pour cree un user
	private function ajoutuser() {
		$this->_ctrlAdmin = new ControleurAdmin();
		$this->_ctrlAdmin->userAjout();
	}

	private function accueil() {
		$this->_ctrlAccueil = new ControleurAccueil();
		$this->_ctrlAccueil->accueil();
	}
// souprime un user
	private function sadmin() {
		$id = intval(Utils::getGet('id'));
		if($id > 0) {
			$this->_ctrlAdmin = new ControleurAdmin();
			$this->_ctrlAdmin->adminSouprime($id);
			header("Location: index.php?controler=listeuser");
		} else {
			throw new Exception('Id incorrect !!!');
		}
	}
// souprime un autheur
	private function sauteur() {
		$id = intval(Utils::getGet('id'));
		if($id > 0) {
			$this->_ctrlAdmin = new ControleurAuteur();
			$this->_ctrlAdmin->auteurSouprime($id);
			header("Location: index.php?controler=listauteur");
		} else {
			throw new Exception('Id incorrect !!!');
		}
	}

	private function recherche() {
				$this->_ctrlLivre = new ControleurLivre();
				if(Utils::getPost('rech_str')) {
					$rech_str = Utils::getPost('rech_str');
					if (strlen($rech_str) < 3 && strlen($rech_str) > 0) {
						throw new Exception('Minimum 3 caracteres !!!');
					} else {
						$this->_ctrlLivre->listeRecherche($rech_str);
					}
					
				} else { 
								$this->_ctrlLivre->listeRecherche(); 
							}
	}

	private function deloge() {
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		session_destroy();
		$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
		header("Location: $redirect");
	}

// function pour le droi de acces
	private function droi($droi) {
		if (!isset($_SESSION['user_biblio']['statut_user']) && $droi > $_SESSION['user_biblio']['statut_user']) { 
			//die('Access interdi'); // ou
			//throw new Exception('Access interdi !!!'); // ou
			header("Location: ".PATH);
		}
	}

}