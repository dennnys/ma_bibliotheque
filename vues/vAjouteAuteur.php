<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Ajouter un(e) auteur(e)</h2>

<form method="POST" action="index.php?controler=listauteur" class="form">
	<div class="row">
		<div class="form-group col-md-4">
			<label for="nom_auteur">Nom</label>
			<input type="text" id="nom_auteur" name="nom_auteur" required class="form-control">
		</div>
	</div>


	<?php 
		if (isset($_SESSION['error_auteur_cree'])) {
			?>
				<div class="row">
					<code><?= $_SESSION['error_auteur_cree'] ?></code>
				</div><br>
			<?php 
		}
	 ?>
	<div class="row">
		<div class="form-group col-md-4">
			<input type="submit" id="cree_auteur" name="cree_auteur" class="btn btn-success" value="AJOUTER">
		</div>
	</div>
</form>