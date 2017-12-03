<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Les auteurs:</h2>

<div class="row">
<table class="table table-hover">
	<tr>
		<th class="up-liste">
			Nom
		</th>
		<th class="up-liste">
			Modifier
		</th>
		<th class="up-liste">
			Supprimer
		</th>

	</tr>
	<div id="resultat">
	<?php 
	 foreach ($liste as $auteur) {  ?>
	 	<tr class="ligne-liste">
			<td><?= $auteur['nom_auteur'] ?></td>
			<td>
				<a href="index.php?controler=mauteur&id=<?= $auteur['id_auteur'] ?>">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
				</a>
			</td>
			<td>
				<a href="index.php?controler=sauteur&id=<?= $auteur['id_auteur'] ?>">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
			</td>
		</tr>
	<?php 
	 }
	 ?>
	</div>
</table>
<blockquote style="border-color: #FF9C00;">ATTENTION: Si vous supprimer un(e) auteur(e), tous ses livres seront egalement supprimer !!!</blockquote>
</div>