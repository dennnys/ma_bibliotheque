<?php defined('BIBLIO') or die('Access interdi'); ?>

	<h3>Se connecter</h3>
	<p><i>Si vous avez un compte chez nous, veuillez-vous connecter.</i></p>
		<form method="POST">
			<div class="form-group">
				<label for="email">Login:</label>
				<input type="text" name="login" class="form-control" id="login">
			</div>
			<div class="form-group">
				<label for="pass">Mot de passe:</label>
				<input type="password" name="pass" class="form-control" id="pass">
			</div>
		<?php 
			if(Utils::getSession('log_error')) {
				?>
				<div><code><?= Utils::getSession('log_error') ?></code>
				</div><br>
				<?php 
			}
			 ?>
			<button type="submit" class="btn btn-success" name="connexion">SE CONNECTER</button>

			
		</form>