<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Modifier:</h2>

<form method="POST" action="index.php?controler=liste" class="form">
	<input type="hidden" name="id_livre_m" value="<?= $liste['id_livre'] ?>">
	<div class="row">
		<div class="form-group col-md-4">
			<label for="nom_livre_m">Titre</label>
			<input type="text" id="nom_livre_m" name="nom_livre_m" required class="form-control" value="<?= $liste['titre'] ?>">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="annee_livre_m">Année</label>
			<input type="text" id="annee_livre_m" name="annee_livre_m" required class="form-control" value="<?= $liste['annee'] ?>">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="auteur_livre_m">Auteur: </label>
			<select name="auteur_livre_m" id="auteur_livre_m">
				<?php 
 					foreach ($auteurList as $auteur) {  ?>
 						<option value="<?= $auteur['id_auteur'] ?>" <?php 
 						if ($auteur['id_auteur']==$liste['auteur_livre'])
 							echo " selected ";
 						 ?>><?= $auteur['nom_auteur'] ?></option>
 				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="resume_livre_m">Résumé</label>
			<textarea name="resume_livre_m" id="resume_livre_m" cols="50" rows="5"><?= $liste['resume'] ?></textarea>
		</div>
	</div>
	<?php 
		if (isset($_SESSION['error_livre_modifie'])) {
			?>
				<div class="row">
					<code><?= $_SESSION['error_livre_modifie'] ?></code>
				</div><br>
			<?php 
		}
	 ?>
	<div class="row">
		<div class="form-group col-md-4">
			<input type="submit" id="modifie_livre" name="modifie_livre" class="btn btn-success" value="MODIFIER">
		</div>
	</div>
</form>
