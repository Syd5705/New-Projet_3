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

   //  public function listerCommentaires() ---------------------------------------------------------------NE FCT PAS
   //   {
   //      $commentaires = $this->CommentaireManager->listerCommentaires();
   //      $vue = new Vue("Commentaires");
   //      $vue->generer(array('commentaires' => $commentaires));
   //  }


    public function ModifierBillet($idBillet)
    {
         // récupérer tous les billets + stocker dans 1 variable
        $billet = $this->BilletManager->getBillet($idBillet);
        
        // créer la vue ModifierBillets / l'instancier
        $vue = new Vue("ModifierBillet");

        // générer cette vue en lui passant la liste des billets en paramètre
        $vue->generer(array('billet' => $billet));
    }
   
    public function billet($idBillet) 
    {     //on veut afficher le billet avec un ID précis, contrairement à la vue accueil où on affiche tous les billets
        $billet = $this->BilletManager->getBillet($idBillet);   // un billet est un ensemble de contenu, id, dates, etc. 
        $commentaires = $this->CommentaireManager->getCommentaires($idBillet);
        $vue = new Vue("Billet");           //pour afficher une vue il faut instancier un objet de class vue. "billet" est un paramètre. les vues dvt tjrs s'appeler VueNomdelavue. on a maintenant notre objet vue. on va la générer en lui envoyant les infos
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));  // va appeler la fct generer id mon objet. on va lui donner les infos que j'ai récupéré 2 lignes au dessus. ca va me créer des variables qui portent le nom de la clé (ici $billet et $commentaires).
    }

    public function enregistrerBillet($titre, $contenu, $idBillet) 
    {
        // Sauvegarde du billet
        $this->BilletManager->enregistrerBillet($titre, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }


    public function SupprimerBillet($idBillet)
    {
        $billet = $this->BilletManager->SupprimerBillet($idBillet);

        $vue = new Vue("SupprimerBillet");
        $vue->generer(array('billet' => $billet));      
            
    }
       public function CreationBillet($titre, $contenu, $idBillet)
    {
        $billet= $this->BilletManager->CreationBillet($titre, $contenu, $idBillet);
        $vue = new Vue("CreationBillet");
        $vue->generer(array('billet' => $billet, 'titre' => $titre));

    }
       

}