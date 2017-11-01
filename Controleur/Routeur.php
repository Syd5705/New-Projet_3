<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurAdmin.php';
require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlConnexion;
    private $ctrlAdmin;

    public function __construct() {  // on instancie les classes pour s'en servir
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrlAdmin = new ControleurAdmin();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {            // on vérifie qu'il y ait le mot action dans l'URL et qu'il y ait qqch écrit derriere le =
                if ($_GET['action'] == 'billet') {      //SI action = billet
                    $idBillet = intval($this->getParametre($_GET, 'id'));  //on veut qu'il nous renvoie l'id sous la forme écrite de la valeur de l'ID. on utilise la fct intval pour transformer le texte numérique en valeur numérique
                    if ($idBillet != 0) {  //si l'id est different de 0.   ! = different de
                        $this->ctrlBillet->billet($idBillet); //on appelle la fct billet du controleurbillet (ctrlbillet) en lui passant/lui donnant l'id du billet pour qu'on puisse s'en servir
                    }
                    else 
                        throw new Exception("Identifiant de billet non valide");
                }
                else if ($_GET['action'] == 'commenter') 
                {   //sinon si action = commenter
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }

                else if ($_GET['action'] == 'chapitres')
                {
                    $this->ctrlBillet->listeBillets();
                }




// Affiche la vueQuisuisje

                else if ($_GET['action'] == 'Quisuisje')
                {
                    $this->ctrlAccueil->Quisuisje();
                }



// Affiche la vueConnexion
                else if ($_GET['action']=='Admin')
                {
                    $this->ctrlAdmin->listeBillets();
                }
                else if ($_GET['action'] == 'Connexion')
                {
                    $this->ctrlConnexion->Connexion();
                }

//RAJOUTER UN ELSE IF POUR MODIFIERBILLETS ET SUPPRIMERBILLETS --------------------------------

                else  //sinon erreur
                    throw new Exception("Action non valide");
            }
            
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }


    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
