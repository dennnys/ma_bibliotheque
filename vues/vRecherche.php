<?php defined('BIBLIO') or die('Access interdi'); ?>

<h2>Résultat de recherche: '<?php
	$temp = Utils::getPost('rech_str');
	$textR = '';
	if($temp) {
		$textR = '<span id="color_recherche" atr = "'.$temp.'">'.$temp.'</span>';
		echo $textR;
	}
 ?>'</h2>

<div class="row">
	<?php 
	if (!empty($liste)) {
	 ?>
		<table class="table table-hover" id="table-recherche">
			<tr>
				<th>Titre</th>
				<th>Auteur</th>
				<th>Annee</th>
			</tr>

		<?php 
		//var_dump(empty($liste));
		 foreach ($liste as $livre) {  ?>
		 	<tr>
			<td><a href="index.php?controler=livre&id=<?= $livre['id_livre'] ?>"><?= $livre['titre'] ?></a></td>
			<td><?= $livre['nom_auteur'] ?></td>
			<td><?= $livre['annee'] ?></td>
			</tr>
		<?php 
		 }
		 ?>
		</table>
	<?php 
	} else {
		echo "<h3>Aucun résultat</h3>";
	}
	?>
</div>