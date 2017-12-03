<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>À propos de ce livre:</h2>


	<div class="row">
		<div>
			<h3><i>Titre:</i> <b><?= $livre['titre'] ?></b></h3>
		</div>
		<div>
			<h3><i>Année:</i> <b><?= $livre['annee'] ?></b></h3>
		</div>
		<div>
			<h3><i>Auteur:</i> <b><?= $livre['nom_auteur'] ?></b></h3>
		</div>
		<div>
			<p><i>Resume:</i> <?= $livre['resume'] ?></p>
		</div>

	</div>
	<?php 
		if (isset($_SESSION['user_biblio']['statut_user']) && $_SESSION['user_biblio']['statut_user']<=3) {
		?>
<form method="POST" class="form">
	<input type="hidden" value="<?=$livre['id_livre']?>" name="comm_livre_id" >
	<div class="row">
		<div class="form-group col-md-8">
			<label for="comm_livre">Votre commentaire:</label>
			<textarea placeholder="minimum 6 characteres..." name="comm_livre" id="comm_livre" cols="50" rows="4" class="form-control" required></textarea>
		</div>
	</div>
		<?php 
		if (isset($_SESSION['error_comm'])) {
			?>
				<div class="row">
					<code><?= $_SESSION['error_comm'] ?></code>
				</div><br>
			<?php } ?>
	<div class="row">
		<div class="form-group col-md-4">
			<input type="submit" id="cree_comm" name="cree_comm" class="btn btn-success" value="PUBLIER">
		</div>
	</div>
</form>
		<?php } 
		if (!empty($comms)) {
				echo "<hr>";
			foreach ($comms as $comm) {
	?>

	<div class="row">
		<div class="col-md-10">
			<blockquote style="border-color: #B300E0;"><b><?= $comm['nom_user'] ?></b> <i>[<?= $comm['date_comm'] ?>]</i><br><?= $comm['text_comm'] ?></blockquote>
		</div>
		<div class="col-md-2" style="font-size: 1.5em; color: red;">
		<?php 
		if (isset($_SESSION['user_biblio']['statut_user']) && (($_SESSION['user_biblio']['statut_user']<=2) || $_SESSION['user_biblio']['id_user'] == $comm['auteur_comm'])) {
		?>
			<form method="POST">
				<input type="hidden" name="s_comm_id" value="<?= $comm['id_comm'] ?>">
				<button style="background-color: transparent; border: 0;" type="submit" class="glyphicon glyphicon-trash" aria-hidden="true" name="souprime_comm">
			</form>
		<?php } ?>
		</div>
	</div>
	<?php
		} 
	} ?>


