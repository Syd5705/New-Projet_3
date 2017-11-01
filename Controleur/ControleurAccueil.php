<?php

require_once 'Modele/BilletManager.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function accueil() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));
    }





// Affiche la vueQuisuisje
    public function Quisuisje()
    {
    	//créer la vueQuisje
    	$vue = new Vue("Quisuisje");
    	// la générer 
    	$vue->generer(array());
    }


}

