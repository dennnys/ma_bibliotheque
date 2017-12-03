<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Les utilisateurs:</h2>

<div class="row">
<table class="table table-hover">
	<tr>
		<th class="up-liste">
			Nom
		</th>
		<th class="up-liste">
			Login
		</th>
		<th class="up-liste">
			Statut
		</th>
		<th class="up-liste">
			Supprimer
		</th>

	</tr>
	<div id="resultat">
	<?php 
	 foreach ($liste as $user) {  ?>
	 	<tr class="ligne-liste">
			<td><?= $user['nom_user'] ?></td>
			<td><?= $user['login'] ?></td>
			<td><?= $user['nom_statut'] ?></td>
			<td>
				<a href="index.php?controler=sadmin&id=<?= $user['id_user'] ?>">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
			</td>
		</tr>
	<?php 
	 }
	 ?>
	</div>
</table>
</div>