<?php
// entre principale
define('BIBLIO', TRUE);

// le configuration
include('config/connexion.php');

/*
echo "<pre>";
//var_dump($_SERVER);
var_dump($_SERVER['REQUEST_URI']);
var_dump($_SERVER['QUERY_STRING']);
var_dump($_SERVER['REQUEST_METHOD']);

var_dump($_GET);
var_dump($_POST);
echo "</pre>";
*/

// le controleur
$controleur = new Controleur();
$controleur->routerRequete();

?>
