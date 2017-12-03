<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Modifier le/la auteur(e):</h2>

<form method="POST" action="index.php?controler=listauteur" class="form">
<input type="hidden" name="id_auteur_m" value="<?= $liste['id_auteur'] ?>">
	<div class="row">
		<div class="form-group col-md-4">
			<label for="nom_user">Nom de auteur</label>
			<input type="text" id="nom_user" name="nom_auteur_m" required class="form-control" value="<?= $liste['nom_auteur'] ?>">
		</div>
	</div>
	<?php 
		if (isset($_SESSION['error_auteur_modifie'])) {
			?>
				<div class="row">
					<code><?= $_SESSION['error_auteur_modifie'] ?></code>
				</div><br>
			<?php 
		}
	 ?>
	<div class="row">
		<div class="form-group col-md-4">
			<input type="submit" id="nom_user" name="modifie_auteur" class="btn btn-success" value="MODIFIER">
		</div>
	</div>
</form>