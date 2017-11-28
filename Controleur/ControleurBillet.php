<?php

require_once 'Modele/BilletManager.php';
require_once 'Modele/CommentaireManager.php';
require_once 'Vue/Vue.php';

class ControleurBillet
{

    private $billet;
    private $commentaire;

    public function __construct() 
    {             //on a acces au modele billet et au modele commentaire, on va les instancier pour s'en servir. on va les chercher pour s'en servir
        $this->BilletManager = new BilletManager();
        $this->CommentaireManager = new CommentaireManager();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) 
    {     //on veut afficher le billet avec un ID précis, contrairement à la vue accueil où on affiche tous les billets
        $billet = $this->BilletManager->getBillet($idBillet);   // un billet est un ensemble de contenu, id, dates, etc. 
        $commentaires = $this->CommentaireManager->getCommentaires($idBillet);
        $vue = new Vue("Billet");           //pour afficher une vue il faut instancier un objet de class vue. "billet" est un paramètre. les vues dvt tjrs s'appeler VueNomdelavue. on a maintenant notre objet vue. on va la générer en lui envoyant les infos
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));  // va appeler la fct generer id mon objet. on va lui donner les infos que j'ai récupéré 2 lignes au dessus. ca va me créer des variables qui portent le nom de la clé (ici $billet et $commentaires).
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) 
    {
        // Sauvegarde du commentaire
        $this->CommentaireManager->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    // Liste la totalité des billets
    public function listeBillets()
    {
        // récupérer tous les billets + stocker dans 1 variable
        $billets = $this->BilletManager->getBillets();
        // var_dump($billets); 

        // créer la vue chapitres / l'instancier
        $vue = new Vue("chapitres");

        // générer cette vue en lui passant la liste des billets en paramètre
        $vue->generer(array('billets' => $billets));
    }



     // Affiche les détails sur un commentaire
    public function commentaire($idCommentaire) 
    {     //on veut afficher le commentaire avec un ID précis, contrairement à la vue accueil où on affiche tous les commentaires
        $Commentaires = $this->CommentaireManager->getCommentaires($idCommentaire);
        $vue = new Vue("Commentaires");           //pour afficher une vue il faut instancier un objet de class vue. "commentaires" est un paramètre. les vues dvt tjrs s'appeler Vue("Nomdelavue"). on a maintenant notre objet vue. on va la générer en lui envoyant les infos
        $vue->generer(array('Commentaires' => $Commentaires));  // va appeler la fct generer id mon objet. on va lui donner les infos que j'ai récupéré 2 lignes au dessus. ca va me créer des variables qui portent le nom de la clé (ici $billet et $commentaires).
    }


// PARTIE COMMENTAIRES //

    // Liste la totalité des commentaires
    public function ListeTousCommentaires()
    {

        // récupérer tous les commentaires + stocker dans 1 variable
        $Commentaires = $this->CommentaireManager->getAllCommentaires();
        // var_dump($idCommentaire); 

        // créer la vue chapitres / l'instancier
        $vue = new Vue("Commentaires");

        // générer cette vue en lui passant la liste des billets en paramètre
        $vue->generer(array('Commentaires' => $Commentaires));
    }



    // Supprimer commentaires

       public function SupprimerCommentaire($idcommentaire)
    {
        $commentaire = $this->CommentaireManager->SupprimerCommentaire($idcommentaire);

        $vue = new Vue("SupprimerCommentaire");
        $vue->generer(array('commentaire' => $commentaire));      
            
    }


    // Signaler les commentaires

    public function SignalerCommentaire($idCommentaire)
    {
        $commentaire = $this->CommentaireManager->SignalerCommentaire($idCommentaire);
        return true;    // va nous retourner les variables qui sont vraies
    }


   
        
}

