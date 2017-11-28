<?php

require_once 'Modele/Modele.php';
require_once 'Entites/Connexion.php';


class ConnexionManager extends Modele {

    /** Renvoie les informations sur un billet
     * 
     * param int $id L'identifiant du billet
     * return array Le billet
     * throws Exception Si l'identifiant du billet est inconnu
     */
    public function getConnexion($pseudo, $password) {
        $sql = 'select * from T_CONNEXION'
                . ' where Pseudo=? AND Password=?';
        $stmt = $this->executerRequete($sql, array($pseudo, $password));
        if ($stmt->rowCount() > 0)
            return $stmt->fetch();  // Accès à la première ligne de résultat
        else
            return false;
    }

}