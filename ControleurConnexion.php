<?php

require_once 'Modele/ConnexionManager.php';
require_once 'Vue/Vue.php';


class ControleurConnexion
{

    public function __construct()
    { //on a acces au modele billet et au modele commentaire, on va les instancier pour s'en servir. on va les chercher pour s'en servir
        $this->ConnexionManager = new ConnexionManager();
        $this->BilletManager = new BilletManager();

    }


    // Affiche la vueConnexion
    public function Connexion()
    {
        session_start(); 

        $pseudo_password_empty = false;
        $pseudo_password_incorrect = false;

        if (isset($_POST['pseudo'])) {

            if (empty($_POST["pseudo"]) && empty($_POST["password"])) {
                $pseudo_password_empty = true;

            } else {
                $connexion = $this->ConnexionManager->getConnexion($_POST["pseudo"], $_POST["password"]);

                // faire var_dump pour voir ce que contient le controleur connexion en fct de si les pseudo et password sont remplis ou non
                if ($connexion) {  // mettre la valeur qu'on a trouvé dans le var_dump
                    // redirection vers index?controleur=vueAdmin
                    //  "index.php?action=vueAdmin"
                    $billets = $this->BilletManager->getBillets(); // récupérer les billets dans une variable et les envoyer vers la vue admin

                    // Faire la redirection
                    $vue = new Vue("Admin");
                    $vue->generer(array('billets' => $billets));

                    $_SESSION['admin'] = true;
                }
                else 
                {
                    $pseudo_password_incorrect = true;
                }
            }
        }

        //créer la vueConnexion
        $vue = new Vue("Connexion");
        // la générer
        $vue->generer(array(
                'pseudo_password_empty' => $pseudo_password_empty,
                'pseudo_password_incorrect' => $pseudo_password_incorrect,
            )
        );
    }
}

