<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Ajouter un livre:</h2>

<form method="POST" action="index.php?controler=liste" class="form">
	<div class="row">
		<div class="form-group col-md-4">
			<label for="nom_livre">Titre</label>
			<input type="text" id="nom_livre" name="nom_livre" required class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="annee_livre">Anneé</label>
			<input type="text" id="annee_livre" name="annee_livre" required class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="auteur_livre">Auteur: </label>
			<select name="auteur_livre" id="auteur_livre">
				<?php 
 					foreach ($liste as $auteur) {  ?>
 						<option value="<?= $auteur['id_auteur'] ?>"><?= $auteur['nom_auteur'] ?></option>
 				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="resume_livre">Résumé</label>
			<textarea name="resume_livre" id="resume_livre" cols="50" rows="5"></textarea>
		</div>
	</div>
	<?php 
		if (isset($_SESSION['error_livre_cree'])) {
			?>
				<div class="row">
					<code><?= $_SESSION['error_livre_cree'] ?></code>
				</div><br>
			<?php 
		}
	 ?>
	<div class="row">
		<div class="form-group col-md-4">
			<input type="submit" id="cree_livre" name="cree_livre" class="btn btn-success" value="AJOUTER">
		</div>
	</div>
</form>
