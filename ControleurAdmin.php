<?php


require_once 'Modele/BilletManager.php';
require_once 'Modele/CommentaireManager.php';
require_once 'Vue/Vue.php';

class ControleurAdmin {

   public function __construct() 
    {             // on a acces au modele billet et au modele commentaire, on va les instancier et les chercher pour s'en servir
        $this->BilletManager = new BilletManager();
        $this->CommentaireManager = new CommentaireManager();
    }




    // Liste la totalité des billets
    public function listeBillets()
    {
        // récupérer tous les billets + stocker dans 1 variable
        $billets = $this->BilletManager->getBillets();
        // var_dump($billets); 

        // créer la vue chapitres / l'instancier
        $vue = new Vue("Admin");

        // générer cette vue en lui passant la liste des billets en paramètre
        $vue->generer(array('billets' => $billets));
    }

public function ModifierBillets()
{
         // récupérer tous les billets + stocker dans 1 variable
        $billets = $this->BilletManager->getBillets();
        
        // créer la vue ModifierBillets / l'instancier
        $vue = new Vue("ModifierBillets");

        // générer cette vue en lui passant la liste des billets en paramètre
        $vue->generer(array('billets' => $billets));
}
   

public function SupprimerBillets()
{
         // récupérer tous les billets + stocker dans 1 variable
        $billets = $this->BilletManager->SupprimerBillets(); // c'était getBillets avant
        
        // créer la vue ModifierBillets / l'instancier
        $vue = new Vue("SupprimerBillets");

        // générer cette vue en lui passant la liste des billets en paramètre
        $vue->generer(array('billets' => $billets));


     
}
   

      

}