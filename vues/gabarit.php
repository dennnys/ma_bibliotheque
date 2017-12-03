<?php defined('BIBLIO') or die('Access interdi'); ?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
			<link rel ="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
					<script src ="ui/highlight.js"></script>
			<link rel="stylesheet" href="ui/style.css" />
			<link rel="stylesheet" href="ui/bootstrap_faly.css" />
		<title>Ma bibliothèque</title>
	</head>
	<body>
		<div id="global" class="container">
			<header>
				<h1 id="titreBlog">TP_2 : Ma bibliothèque</h1>
				<div class="row">
							<a href="index.php?controler=accueil" class ="btn btn-primary gauche">ACCUEIL</a>
							<a href="index.php?controler=liste" class ="btn btn-primary gauche">LISTE</a>
						<span class="input-group col-md-3 gauche">
							<form action="index.php?controler=recherche" method="POST" class="input-group">
								<input type="text" class="form-control" placeholder="recherch..." name="rech_str">
								<span class="input-group-btn">
								<button class="btn btn-success" name="recherche"  type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
								</span>
							</form>
						</span><!-- /input-group -->
				</div>
			</header>
			<hr>
			<div class="row">
				<div class="col-sm-8">
					<div id="contenu">
						<?php
						echo $contenu;
						?>
					</div> <!-- #contenu -->
				</div>
				<div class="col-sm-1">
				</div>
				<div class="col-sm-3">
					<div class="sidebar">
						<?php 
							if (Autentification::isAuthen()){
									$vueSA = new Vue('SuperAdmin');
									echo $vueSA->genererPartiel();
							} else {
								$vueLA = new Vue('LogeAdmin');
								echo $vueLA->genererPartiel();
							}
							//var_dump($_SESSION);
						?>
					</div>
				</div>
			</div>
			<hr>
			<footer id="piedBlog">
				Réalisé avec PHP, HTML5 et Bootstrap. <br>TP2 : Birnaz Denis <?= date('Y') ?>
			</footer>
		</div> <!-- #global -->
		<script src ="ui/main.js"></script>
	</body>
</html>