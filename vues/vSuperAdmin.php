<?php defined('BIBLIO') or die('Access interdi'); 

	$droiUser = intval($_SESSION['user_biblio']["statut_user"]);
 ?>
<h3>Bonjour <b><?= $_SESSION['user_biblio']["nom_user"]?></b></h3>
		<h4>Vous avez le droit de: <b><?= $_SESSION['user_biblio']["nom_statut"]?></b></h4>
		
			<div class="btn-group-vertical col-md-12">
				<a href="index.php?controler=mprofil&id=<?= $_SESSION['user_biblio']["id_user"] ?>" class="btn  btn-primary ">MON PROFILÉ</a>
				
			</div>

		<?php if ($droiUser <=2) { ?>
			<div class="btn-group-vertical col-md-12">
				<a href="index.php?controler=listauteur" class="btn  btn-primary ">LISTES DES AUTEURS</a>
				<a href="index.php?controler=ajoutauteur" class="btn  btn-primary ">AJOUTER UN(E) AUTEUR(E)</a>
				<a href="index.php?controler=liste" class="btn  btn-primary ">LISTES DES LIVRES</a>
				<a href="index.php?controler=ajoutlivre" class="btn  btn-primary ">AJOUTER UN LIVRE</a>
			</div>
		<?php } ?>
		<?php if ($droiUser <=1) { ?>
			<div class="btn-group-vertical col-md-12">
				
				<a href="index.php?controler=listeuser" class="btn  btn-primary ">LISTES DES UTILISATEURS</a>
				<a href="index.php?controler=ajoutuser" class="btn  btn-primary ">AJOUTER UN(E) UTILISATEUR</a>
			</div>
		<?php } ?>
			<div class="btn-group-vertical col-md-12">
				<a href="index.php?controler=deloge" class="btn  btn-danger">DÉCONNEXION</a>
			</div>
		