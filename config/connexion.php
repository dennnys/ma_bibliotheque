<?php

defined('BIBLIO') or die('Access interdi');

define('SEL', 'a1s2d3_%_q4w5e6');
define('PATH', 'index.php?controler=accueil');

session_start();
//$_SESSION['id'] =  256;

define('CRTL_DIR', 'controleurs/');
define('CLASS_DIR', 'modeles/');	// Chemin vers les classes
define('LIB_DIR', 'lib/');	// Chemin vers les classes
define('VIEW_DIR', 'vues/');
// Ajoute le chemin dans les "path"
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
// Ajoute le chemin dans les "path"
set_include_path(get_include_path().PATH_SEPARATOR.LIB_DIR);
set_include_path(get_include_path().PATH_SEPARATOR.CRTL_DIR);
set_include_path(get_include_path().PATH_SEPARATOR.VIEW_DIR);
// Défini l'extension de fichier ".class.php" = Personne.class.php
spl_autoload_extensions('.class.php');
spl_autoload_register();
