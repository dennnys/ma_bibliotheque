<?php defined('BIBLIO') or die('Access interdi'); 

class Vue {
    //Nom du fichier associé à la vue
    private $_fichier;
    
    function __construct($action){
        $this->_fichier = "vues/v".$action.".php";
    }
    
    function generer($donnees){
        //Generation de la vue specifique 
        $contenu = $this->genererFichier($this->_fichier, $donnees);
        $vue = $this->genererFichier('vues/gabarit.php', array('contenu'=>$contenu));
        echo $vue;
    }

    function genererPartiel($donnees=array()){
        return $this->genererFichier($this->_fichier, $donnees);
    }
    
    private function genererFichier($fichier, $donnees){
        if(file_exists($fichier)){
            //array('livre'=>array('id'=>6, 'auteur'=>blal));
            extract($donnees);
            //$livre = array('id'=>6, 'auteur'=>blal);

           // extract($commes);

            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        
    }
}