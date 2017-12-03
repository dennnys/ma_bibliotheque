<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Votre profilé:</h2>

<form method="POST" action="index.php?controler=listeuser" class="form">
	<div class="row">
		<div class="form-group col-md-4">
			<label for="nom_user">Nom d'utilizateur</label>
			<input type="text" id="nom_user" name="nom_user_m" required class="form-control" value="<?= $_SESSION['user_biblio']['nom_user'] ?>">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="login_user">Login</label>
			<input type="text" id="login_user" name="login_user_m" required class="form-control" value="<?= $_SESSION['user_biblio']['login'] ?>">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="statut_user">Statut: <i><?= $_SESSION['user_biblio']['nom_statut'] ?></i></label>
		</div>
	</div>
	<?php 
		if (!$liste) {
	?>
		<div>
			<blockquote style="border-color: #FF9C00;">ATTENTION: Votre mot de passe par défaut est '123', vous-pouvez le change !!!</blockquote>
		</div>
	<?php } ?>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="pass_user">Nouveau mot de pass</label>
			<input type="password" id="pass_user" name="pass_user_m" class="form-control">
		</div>
	</div>
	<?php 
		if (isset($_SESSION['error_user_modifie'])) {
			?>
				<div class="row">
					<code><?= $_SESSION['error_user_modifie'] ?></code>
				</div><br>
			<?php 
		}
	 ?>
	<div class="row">
		<div class="form-group col-md-4">
			<input type="submit" id="nom_user" name="modifie_user" class="btn btn-success" value="MODIFIER MON PROFILÉ">
		</div>
	</div>
</form>
