<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Ajouter un(e) utilizateur</h2>

<form method="POST" action="index.php?controler=listeuser" class="form">
	<div class="row">
		<div class="form-group col-md-4">
			<label for="nom_user">Nom</label>
			<input type="text" id="nom_user" name="nom_user" required class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="login_user">Login</label>
			<input type="text" id="login_user" name="login_user" required class="form-control ">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="statut_user">Statut</label>
			<select name="statut_user" id="statut_user">
				<?php 
 					foreach ($liste as $statut) {  ?>
 						<option value="<?= $statut['id_statut'] ?>"><?= $statut['nom_statut'] ?></option>
 				<?php } ?>
			</select>
		</div>
	</div>
	<?php 
		if (isset($_SESSION['error_user_cree'])) {
			?>
				<div class="row">
					<code><?= $_SESSION['error_user_cree'] ?></code>
				</div><br>
			<?php 
		}
	 ?>
	<div class="row">
		<div class="form-group col-md-4">
			<input type="submit" id="nom_user" name="cree_user" class="btn btn-success" value="CRÉER">
		</div>
	</div>
</form>

<blockquote style="border-color: #FF9C00;">ATTENTION: Le mot de passe par defaut est: '123'</blockquote>