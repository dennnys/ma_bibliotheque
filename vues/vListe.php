<?php defined('BIBLIO') or die('Access interdi'); 

	if(Utils::getGet('filtre')&& Utils::getGet('ordre')) {
							$filtre = Utils::getGet('filtre');
							$ordre = Utils::getGet('ordre');
	} else {
		$filtre = 'titre';
		$ordre = 'ASC';
	}
 ?>
<h2>Les livres:</h2>

<div class="row">
<table class="table table-hover">
	<tr>
		<th class="up-liste">
			<a href="index.php?controler=liste&filtre=titre&ordre=<?php 
				if($filtre == 'titre' && $ordre == 'ASC') { echo 'DESC'; }
					else { echo 'ASC'; }
			 ?>">Titre</a>
			<?php 
				if($filtre == 'titre' && $ordre == 'ASC' ) 
					echo '<span class="glyphicon glyphicon-chevron-down"></span>';
				if($filtre == 'titre' && $ordre == 'DESC' ) 
					echo '<span class="glyphicon glyphicon-chevron-up"></span>';
			 ?>
		</th>
		<th class="up-liste">
			<a href="index.php?controler=liste&filtre=nom_auteur&ordre=<?php 
				if($filtre == 'nom_auteur' && $ordre == 'ASC') { echo 'DESC'; }
					else { echo 'ASC'; }
			?>">Auteur</a>
			<?php 
				if($filtre == 'nom_auteur' && $ordre == 'ASC' ) 
					echo '<span class="glyphicon glyphicon-chevron-down"></span>';
				if($filtre == 'nom_auteur' && $ordre == 'DESC' ) 
					echo '<span class="glyphicon glyphicon-chevron-up"></span>';
			 ?>
		</th>
		<th class="up-liste">
			<a href="index.php?controler=liste&filtre=annee&ordre=<?php 
				if($filtre == 'annee' && $ordre == 'ASC') { echo 'DESC'; }
					else { echo 'ASC'; }
			 ?>">Année</a>
			<?php 
				if($filtre == 'annee' && $ordre == 'ASC' ) 
					echo '<span class="glyphicon glyphicon-chevron-down"></span>';
				if($filtre == 'annee' && $ordre == 'DESC' ) 
					echo '<span class="glyphicon glyphicon-chevron-up"></span>';
			 ?>
		</th>
		<?php 
			if (isset($_SESSION['user_biblio']["statut_user"])&& $_SESSION['user_biblio']["statut_user"]<3) {
		?>
		<th>
			Modifier
		</th>
		<th>
			Supprimer
		</th>
		<?php } ?>  
	</tr>
	<div id="resultat">
	<?php 
	 foreach ($liste as $livre) {  ?>
	 	<tr class="ligne-liste">
			<td><a href="index.php?controler=livre&id=<?= $livre['id_livre'] ?>"><?= $livre['titre'] ?></a></td>
			<td><?= $livre['nom_auteur'] ?></td>
			<td><?= $livre['annee'] ?></td>
			<?php 
				if (isset($_SESSION['user_biblio']["statut_user"])&& $_SESSION['user_biblio']["statut_user"]<3) {
			?>
			<td>
				<a href="index.php?controler=mlivre&id=<?= $livre['id_livre'] ?>">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
				</a>
			</td>
			<td>
				<a href="index.php?controler=slivre&id=<?= $livre['id_livre'] ?>">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
			</td>
		</tr>
		<?php }  
	 }
	 ?>
	</div>
</table>
</div>