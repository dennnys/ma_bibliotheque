<?php
defined('BIBLIO') or die('Access interdi');
// controleur accueil
class ControleurAccueil{
    
    function accueil(){
        $vueAccueil = new Vue('Accueil');
        $vueAccueil->generer(array('donne' => ''));
    }


}